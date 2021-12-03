<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        "user_id","points"
    ];

    public function Player(){
        return $this->belongsTo(User::class);
    }
}
