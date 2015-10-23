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

    public function getUser($id)
    {
        $user = $this->
            withAvatar()->
            where('users.id', '=', $id)->
            get();
        return $user;
    }

    public function friends()
    {
        return $this->hasMany('App\Models\Friend');
    }

    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobby');
    }

    public function avatars()
    {
        return $this->hasMany('App\Models\Avatar');
    }

    public function getHobbies($id)
    {
        $user = $this->find($id);
        $result = $user->
            hobbies()->
            join('interests', 'interests.id', '=', 'interest_id')->
            get();
        return $result;
    }

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
}
