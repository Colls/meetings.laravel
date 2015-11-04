<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Friend;
use Mockery\CountValidator\Exception;

class FriendshipController extends Controller
{
    /**
     * withdraw my friendship offer (i've subscribed on this person already and i wan't to refuse )
     *
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Friend $modelFriend, $id, $fid)
    {
        try {
            if ($modelFriend->cancelFriendship($id, $fid)) {
                return redirect()->route('user.subscriptions', ['id' => $id]);
            }
            throw new Exception('Problem with database');
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * approve friendship offer
     *
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Friend $modelFriend, $id, $fid)
    {
        try {
            if ($modelFriend->approveFriendship($id, $fid)) {
                return redirect()->route('user.proposals', ['id' => $id]);
            }
            throw new Exception('Problem with database');
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * deny friendship offer, person adds to subscribers list
     *
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deny(Friend $modelFriend, $id, $fid)
    {
        try {
            if ($modelFriend->denyFriendship($id, $fid)) {
                return redirect()->route('user.proposals', ['id' => $id]);
            }
            throw new Exception('Problem with database');
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     *
     *
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Friend $modelFriend, $id, $fid)
    {
        try {
            if ($modelFriend->addFriendship($id, $fid)) {
                return redirect()->back();
            }
            throw new Exception('Problem with database');
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * @param Friend $modelFriend
     * @param $id
     * @param $fid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Friend $modelFriend, $id, $fid)
    {
        try {
            if ($modelFriend->removeFriendship($id, $fid)) {
                return redirect()->back();
            }
            throw new Exception('Problem with database');
        } catch(Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
