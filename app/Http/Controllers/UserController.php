<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helpers\FileSystemHelper;
use Auth; //use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Avatar;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $userModel
     * @param Avatar $avatarModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, User $userModel, Avatar $avatarModel)
    {
        $this->validate(
            $request,
            [
                'fname' => 'required|alpha',
                'lname' => 'required|alpha',
                'email' => 'required|email|unique:users,email',
                'gender' => 'required',
                'married' => 'required|boolean',
                'birth_date' => 'required|regex:/^[\d]{4}-[\d]{2}-[\d]{2}$/',
                'file' => 'required|image',
                'password' => 'required|min:6',
                'password_confirmation' => 'same:password',
            ],
            [
                'required' => 'You have not fill field ":attribute". Please, fill it',
                'min' => 'Field ":attribute" must contain minimum :min symbols',
                'unique' => 'Such :attribute already exists'
            ]
        );
        $storage = FileSystemHelper::createUserStorage();
        $avatar = FileSystemHelper::uploadAvatar($storage, $request->file('file'));
        if ($storage && $avatar) {
            $user = $userModel->create([
                'first_name' => $request->get('fname'),
                'last_name' => $request->get('lname'),
                'email' => $request->get('email'),
                'gender' => $request->get('gender'),
                'married' => $request->get('married'),
                'birth_date' => $request->get('birth_date'),
                'password' => bcrypt($request->get('password')),
                'storage' => $storage
            ]);
            $avatarModel->create([
                'avatar' => $avatar,
                'user_id' => $user->id,
                'active' => 1
            ]);
            Auth::loginUsingId($user->id);
        }
        return redirect()->route('user.info', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  User $modelUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $modelUser, $id)
    {
        $user = $modelUser->getUser($id);
        if (!$user->count()) {
//            return redirect('404');
            abort('404');
        }
        $friendshipExist = $modelUser->friendshipExists(Auth::id(), $id);
        $hobbies = $modelUser->getHobbies($id);
        $friends = $modelUser->getApprovedFriends($id);
        return view('profile', ['user' => $user, 'hobbies' => $hobbies, 'friends' => $friends, 'friendshipExist' => $friendshipExist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('i am owner of acc with id ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * authenticate user
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required',
                'remember' => 'boolean'
            ],
            [
                'required' => 'You have not fill field ":attribute". Please, fill it'
            ]
        );
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->has('remember'))) {
            return redirect()->route('user.info', ['id' => Auth::id()]);
        }
        return redirect('login')->withInput(['email' => $request->get('email'), 'remember' => $request->get('remember')])->withErrors('Неправильный email или пароль');
    }

    /**
     * show list of my friendship queries (i want to add this person to friends, i'm subscribed on this person, person has not approved my query yet)
     *
     * @param User $modelUser
     * @param $id
     * @return \Illuminate\View\View
     */
    public function subscriptions(User $modelUser, $id)
    {
        $friends = $modelUser->getSubscriptions($id);
        return view('friends', ['friends' => $friends, 'notice' => 'Заявок нет', 'destination' => true]);
    }

    /**
     * show list of my friendship offers (someone want to add me into friends)
     *
     * @param User $modelUser
     * @param $id
     * @return \Illuminate\View\View
     */
    public function proposals(User $modelUser, $id)
    {
        $friends = $modelUser->getProposals($id);
        return view('friends', ['friends' => $friends, 'notice' => 'Предложений нет', 'destination' => false]);
    }

    /**
     * show list of my denied friends (i don't want to add this person to friends, person still subscribed on me)
     *
     * @param User $modelUser
     * @param $id
     * @return \Illuminate\View\View
     */
    public function denied(User $modelUser, $id)
    {
        $friends = $modelUser->getDenied($id);
        return view('friends', ['friends' => $friends, 'notice' => 'Подписчиков нет', 'destination' => false]);
    }

    public function dialogs(User $modelUser, $id)
    {
        $dialogs = $modelUser->getDialogs($id);
        return view('dialogs', ['dialogs' => $dialogs]);
    }

//    public function chat(Request $request, $id, User $modelUser)
//    {
//        $fid = $request->get('fid');
//        $chat = $modelUser->getMessages($id, $fid);
//        return view('chat', ['chat' => $chat, 'id' => Auth::id(), 'fid' => $fid]);
//    }
}
