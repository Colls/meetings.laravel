<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
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
            paginate(3);
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
            paginate(3);
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
            paginate(12);
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobby');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avatars()
    {
        return $this->hasMany('App\Models\Avatar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dialogs()
    {
        return $this->hasMany('App\Models\Dialog');
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

    public function getPotential($id)
    {
        $myInterests = [];
        $user = $this->find($id);
        $hobbies = $user->hobbies()->get(['interest_id']);
        foreach ($hobbies as $h) {
            $myInterests[] = $h->interest_id;
        }
        $num = count($myInterests) >= 2 ? 2 : false;
        if ($num) {
            $potential = $this->
                join('hobbies', 'hobbies.user_id', '=', 'users.id')->
                join('avatars', 'avatars.user_id', '=', 'users.id')->
                where('active', '=', 1)->
                where(function($query) use ($myInterests, $id){
                    $query->whereIn('hobbies.interest_id', $myInterests)->
                        whereNotIn('hobbies.user_id', [$id]);
                })->
                groupBy('hobbies.user_id')->
                havingRaw('count(hobbies.interest_id)>='.$num)->
                paginate(12);
        } else {
            // fake query, result must be paginated
            $potential = $this->
                join('hobbies', 'hobbies.user_id', '=', 'users.id')->
                where('users.id', '=', 'hobbies.interest_id')->
                where('users.id', '=', 'hobbies.user_id')->
                paginate(12);
        }
        return $potential;
    }
    /**
     * check if friendship note already exists in table
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

    /**
     * return dialogs of selected user
     *
     * @param $id
     * @return mixed
     */
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

    /**
     * return all messages between 2 selected users
     *
     * @param $id
     * @param $fid
     * @return mixed
     */
    public function getMessages($id, $fid)
    {
        $messages = $this->
            select('messages.*', 'messages.created_at as time', 'users.*', 'avatars.*')->
            join('messages', 'messages.user_id', '=', 'users.id')->
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
}
