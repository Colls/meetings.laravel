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

}
