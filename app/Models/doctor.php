<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $guarded=[];
    public function mydoctor(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function times(){
        return $this->hasMany(Time::class);
    }
}
