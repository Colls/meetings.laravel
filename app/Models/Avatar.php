<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'avatars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar', 'user_id', 'active'];


    public function owner()
    {
        return $this->belongsTo('App\Models\User');
    }
}
