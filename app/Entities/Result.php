<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        "match_id","user_id","set_1","set_2","set_3","set_4","set_5","winner"
    ];

    public function Match(){
        return $this->belongsTo(Match::class);
    }

    public function Player(){
        return $this->belongsTo(User::class);
    }
}

