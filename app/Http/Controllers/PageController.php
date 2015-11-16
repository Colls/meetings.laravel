<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
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
        if ($this->request->ajax()) {
            // todo more friendly response
            return response()->json(View::make('inc_users', array('registered' => $registered, 'message' => 'Всего зарегистрировано парней'))->render());
        }
        return view('registered', ['registered' => $registered, 'message' => 'Всего зарегистрировано парней']);
    }

    /**
     * @param User $modelUser
     * @return \Illuminate\View\View
     */
    public function girls(User $modelUser)
    {
        $registered = $modelUser->getGirls();
        if ($this->request->ajax()) {
            // todo more friendly response
            return response()->json(View::make('inc_users', array('registered' => $registered, 'message' => 'Всего зарегистрировано девушек'))->render());
        }
        return view('registered', ['registered' => $registered, 'message' => 'Всего зарегистрировано девушек']);
    }

//    /**
//     * @param User $modelUser
//     * @return \Illuminate\View\View
//     */
//    public function last(User $modelUser)
//    {
//        $registered = $modelUser->getLast();
//        if ($this->request->ajax()) {
//            // todo more friendly response
//            return response()->json(View::make('inc_users', array('registered' => $registered, 'message' => 'Всего зарегистрировано'))->render());
//        }
//        return view('registered', ['registered' => $registered, 'message' => 'Всего зарегистрировано']);
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
