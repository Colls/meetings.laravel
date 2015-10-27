<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $table = 'dialogs';
    protected $fillable = ['user_id', 'friend_id'];
}
