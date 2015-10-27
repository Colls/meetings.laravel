<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Dialog;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $modelUser, Request $request, $id)
    {
        $fid = $request->get('fid');
        if (!User::find($fid) || Auth::id() == $fid) {
            abort('404');
        }
        $chat = $modelUser->getMessages($id, $fid);
        return view('chat', ['chat' => $chat, 'id' => Auth::id(), 'fid' => $fid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Message $modelMessage, User $modelUser, Dialog $modelDialog)
    {
        $fid = $request->get('fid');
        if (!$request->has('message')) {
            return redirect()->route('message.create', ['id' => Auth::id(), 'fid' => $fid]);
        }
        $modelUser->createDialog(Auth::id(), $fid, $modelDialog);
        $modelMessage->create([
            'message' => $request->get('message'),
            'user_id' => $fid,
            'friend_id' => Auth::id()
        ]);
        return redirect()->route('message.create', ['id' => Auth::id(), 'fid' => $fid]);
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
