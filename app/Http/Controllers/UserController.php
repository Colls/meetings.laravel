<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Avatar;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $storage = $userModel->createUserStorage();
        $avatar = $avatarModel->uploadAvatar($storage, $request->file('file'));
        if ($storage && $avatar) {
            $user = $userModel->create([
                'remember_token' => $request->get('_token'),
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
        }
        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
