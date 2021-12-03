<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        "date","time","doubles","sets_id","court_id","users_id","state"
    ];

    public function Player(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function Sets(){
        return $this->belongsTo(Set::class);
    }

    public function Court(){
        return $this->belongsTo(Court::class);
    }

    public function Results(){
        return $this->hasMany(Result::class);
    }

    public function getStatusAttribute(){

        switch ($this->attributes["state"]):
            case 0: $status = "Pendiente";
            break;
            case 1: $status = "Finalizado";
            break;
            case 2: $status = "Confirmado";
            break;
            default: $status = "Pendiente";
        endswitch;

        return $status;
    }
}
