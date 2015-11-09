<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main()
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
        return view('registered', ['registered' => $registered, 'message' => 'Всего зарегистрировано парней']);
    }

    /**
     * @param User $modelUser
     * @return \Illuminate\View\View
     */
    public function girls(User $modelUser)
    {
        $registered = $modelUser->getGirls();
        return view('registered', ['registered' => $registered, 'message' => 'Всего зарегистрировано девушек']);
    }

//    /**
//     * @param User $modelUser
//     * @return \Illuminate\View\View
//     */
//    public function last(User $modelUser)
//    {
//        $registered = $modelUser->getLast();
//        return view('registered', ['registered' => $registered, 'gender' => 'человек']);
//    }

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
