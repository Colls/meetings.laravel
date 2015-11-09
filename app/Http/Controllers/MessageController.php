<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Dialog;
use Mockery\CountValidator\Exception;

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
    public function create(Message $modelMessage, $id, $fid)
    {
        if (!User::find($fid) || Auth::id() == $fid) {
//            return redirect()->back()->withErrors(['Пользователь с таким id не существует']);
            abort('404');
        }
        $chat = $modelMessage->getMessages($id, $fid);
        return view('chat', ['chat' => $chat, 'id' => $id, 'fid' => $fid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Message $modelMessage, Dialog $modelDialog, $id, $fid)
    {
        if (!$request->has('message')) {
            return redirect()->route('message.create', ['id' => $id, 'fid' => $fid]);
        }
        try {
            if (!$modelDialog->createDialog($id, $fid)) {
                throw new Exception('Problem with database: cannot create dialog');
            }
            $crt = $modelMessage->create([
                'message' => $request->get('message'),
                'user_id' => $id,
                'friend_id' => $fid
            ]);
            if (!$crt) {
                throw new Exception('Problem with database: cannot create message');
            }
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('message.create', ['id' => $id, 'fid' => $fid]);
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
