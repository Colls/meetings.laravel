<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $fillable = ['user_id', 'interest_id'];

    public function getHobbies($id)
    {
        $hobbies = $this->join('interests', 'interests.id', '=', 'hobbies.interest_id')->where('hobbies.user_id', '=', $id)->get();
        return $hobbies;
    }
}
