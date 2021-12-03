<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "day","from","to","court_id","user_id"
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Court(){
        return $this->belongsTo(Court::class);
    }

    public function getFromAttribute(){
        return Carbon::createFromTimeString($this->attributes['from'])->format('H:i');
    }

    public function getToAttribute(){
        return Carbon::createFromTimeString($this->attributes['from'])->format('H:i');
    }

    public function getFromFormatAttribute(){
        return date('Y,m,d,H,i,s',strtotime($this->attributes["day"] . ' ' . $this->attributes['from']));
    }

    public function getToFormatAttribute(){
        return date('Y,m,d,H,i,s',strtotime($this->attributes["day"] . ' ' .  $this->attributes['to']));
    }

    protected $appends = ['from_format','to_format'];
}
