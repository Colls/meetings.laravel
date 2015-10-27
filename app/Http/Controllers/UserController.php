<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Helpers\FileSystemHelper;
use Auth; //use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Avatar;
use App\Models\Friend;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @param User $modelUser
     * @return \Illuminate\View\View
     */
    public function boys(User $modelUser)
    {
        $registered = $modelUser->getBoys();
        return view('registered', ['registered' => $registered]);
    }

    /**
     * @param User $modelUser
     * @return \Illuminate\View\View
     */
    public function girls(User $modelUser)
    {
        $registered = $modelUser->getGirls();
        return view('registered', ['registered' => $registered]);
    }

    /**
     * @param User $modelUser
     * @return \Illuminate\View\View
     */
    public function last(User $modelUser)
    {
        $registered = $modelUser->getLast();
        return view('registered', ['registered' => $registered]);
    }

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
     * show login form
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('login');
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
        return redirect('login')->withErrors('Неправильный email или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    /**
     * show list of my friendship queries (i want to add this person to friends, i'm subscribed on this person, person has not approved my query yet)
     *
     * @param User $modelUser
     * @param $id
     * @return \Illuminate\View\View
     */
    public function subscriptionFriends(User $modelUser, $id)
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
    public function proposalFriends(User $modelUser, $id)
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
//    public function deniedFriends(User $modelUser, $id)
//    {
//        $friends = $modelUser->getDenied($id);
//        return view('friends', ['friends' => $friends, 'notice' => 'Подписчиков нет', 'destination' => false]);
//    }

    /**
     * withdraw my friendship offer (i've subscribed on this person already and i wan't to refuse )
     *
     * @param Request $request
     * @param Friend $modelFriend
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelFriendship(Request $request, Friend $modelFriend, $id)
    {
        $fid = $request->get('fid');
        $modelFriend->cancelFriendship($id, $fid);
        return redirect()->route('user.subscriptions', ['id' => $id]);
    }

    /**
     *
     *
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function cancelFriendshipAlt(Friend $modelFriend, $id, $fid)
//    {
//        dd($id, $fid);
//        $modelFriend->cancelFriendship($id, $fid);
//        return redirect()->route('user.subscriptions', ['id' => $id]);
//    }

    /**
     * approve friendship offer
     *
     * @param Request $request
     * @param Friend $modelFriend
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveFriendship(Request $request, Friend $modelFriend, $id)
    {
        $fid = $request->get('fid');
        $modelFriend->approveFriendship($id, $fid);
        return redirect()->route('user.proposals', ['id' => $id]);
    }

    /**
     * deny friendship offer, person adds to subscribers list
     *
     * @param Request $request
     * @param Friend $modelFriend
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function denyFriendship(Request $request, Friend $modelFriend, $id)
    {
        $fid = $request->get('fid');
        $modelFriend->denyFriendship($id, $fid);
        return redirect()->route('user.proposals', ['id' => $id]);
    }

    public function addFriendship(Request $request, Friend $modelFriend, $id)
    {
        $fid = $request->get('fid');
        $modelFriend->addFriendship($id, $fid);
        return redirect()->back();
    }

    public function removeFriendship(Request $request, Friend $modelFriend, $id)
    {
        $fid = $request->get('fid');
        $modelFriend->removeFriendship($id, $fid);
        return redirect()->back();
    }

    public function dialogs(User $modelUser, $id)
    {
        $dialogs = $modelUser->getDialogs($id);
//        dd($dialogs);
        return view('dialogs', ['dialogs' => $dialogs]);
    }

//    public function chat(Request $request, $id, User $modelUser)
//    {
//        $fid = $request->get('fid');
//        $chat = $modelUser->getMessages($id, $fid);
//        return view('chat', ['chat' => $chat, 'id' => Auth::id(), 'fid' => $fid]);
//    }
}
