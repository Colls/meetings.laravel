<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Mockery\CountValidator\Exception;
use App\Models\Friend;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'gender', 'email', 'password', 'married', 'birth_date', 'storage'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * scope for last registered people
     *
     * @param $query
     */
    public function scopeLast($query)
    {
        $query->latest('users.created_at')->
            join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1);
    }

    /**
     * scope for joining user with active avatar
     *
     * @param $query
     */
    public function scopeWithAvatar($query)
    {
        $query->join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1);
    }

    /**
     * get all registered boys
     *
     * @return mixed
     */
    public function getBoys()
    {
        $boys = $this->
            last()->
            where('gender', '=', 'm')->
            paginate(8);
        return $boys;
    }

    /**
     * get all registered girls
     *
     * @return mixed
     */
    public function getGirls()
    {
        $girls = $this->
            last()->
            where('gender', '=', 'f')->
            paginate(8);
        return $girls;
    }

    /**
     * get all registered people
     *
     * @return mixed
     */
    public function getLast()
    {
        $last = $this->
            last()->
            paginate(8);
        return $last;
    }

    /**
     * get selected user
     *
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        $user = $this->
            withAvatar()->
            where('users.id', '=', $id)->
            get();
        return $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friends()
    {
        return $this->hasMany('App\Models\Friend');
    }

    /**
     * get approved friends of selected user
     *
     * @param $id
     * @return mixed
     */
    public function getApprovedFriends($id)
    {
        $user = $this->find($id);
        $result = $user->
            friends()->
            where('status','approved')->
            join('users', 'users.id', '=', 'friends.friend_id')->
            join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1)->
            get();
        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobby');
    }

    /**
     * get hobbies of selected user
     *
     * @param $id
     * @return mixed
     */
    public function getHobbies($id)
    {
        $user = $this->find($id);
        $result = $user->
            hobbies()->
            join('interests', 'interests.id', '=', 'interest_id')->
            get();
        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avatars()
    {
        return $this->hasMany('App\Models\Avatar');
    }

    public function dialogs()
    {
        return $this->hasMany('App\Models\Dialog');
    }

    /**
     * return my subscriptions
     *
     * @param $id
     * @return mixed
     */
    public function getSubscriptions($id)
    {
        $user = $this->find($id);
        $subscriptions = $user->
            friends()->
            where('status','subscription')->
            join('users', 'users.id', '=', 'friends.friend_id')->
            join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1)->
            get();
        return $subscriptions;
    }

    /**
     * return my proposals
     *
     * @param $id
     * @return mixed
     */
    public function getProposals($id)
    {
        $user = $this->find($id);
        $proposals = $user->
            friends()->
            where('status','proposal')->
//            orWhere('status','delete')->
            join('users', 'users.id', '=', 'friends.friend_id')->
            join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1)->
            get();
        return $proposals;
    }

//    public function getDenied($id)
//    {
//        $user = $this->find($id);
//        $denied = $user->
//            friends()->
//            where('status','denied')->
//            join('users', 'users.id', '=', 'friends.friend_id')->
//            join('avatars', 'avatars.user_id', '=', 'users.id')->
//            where('active', '=', 1)->
//            get();
//        return $denied;
//    }

    /**
     * check if friendship already exists
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function friendshipExists($id, $fid)
    {
        $user = $this->find($id);
        return !$user->friends()->where('friend_id', $fid)->get()->isEmpty();
    }

    public function getDialogs($id)
    {
        $user = $this->find($id);
        $dialogs = $user->
            dialogs()->
            join('avatars', 'avatars.user_id', '=', 'dialogs.friend_id')->
            join('users', 'users.id', '=', 'dialogs.friend_id')->
            where('active', '=', '1')->
            orderBy('dialogs.updated_at', 'desc')->
            groupBy('dialogs.friend_id')->
            get();
        return $dialogs;
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function getMessages($id, $fid)
    {
        $messages = $this->
            select('messages.*', 'messages.created_at as time', 'users.*', 'avatars.*')->
            join('messages', 'messages.friend_id', '=', 'users.id')->
            where(function($query) use ($id, $fid){
                $query->where('messages.friend_id', $id)->where('messages.user_id', $fid);
            })->
            orWhere(function($query) use ($id, $fid){
                $query->where('messages.user_id', $id)->where('messages.friend_id', $fid);
            })->
            join('avatars', 'avatars.user_id', '=', 'messages.friend_id')->
            whereActive(1)->
            orderBy('time')->
            get();
        return $messages;
    }

    private function dialogExist($id, $fid)
    {
        $user = $this->find($id);
        return !$user->friends()->where('friend_id', $fid)->get()->isEmpty();
    }

    public function createDialog($id, $fid, Dialog $modelDialog)
    {
        if (!$this->dialogExist($id, $fid)) {
            $modelDialog->create([
                'user_id' => $id,
                'friend_id' => $fid
            ]);
            $modelDialog->create([
                'user_id' => $fid,
                'friend_id' => $id
            ]);
        }
    }

}
