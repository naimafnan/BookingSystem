<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\doctor;
class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    //get doctor name relation between appointment with user table 
    public function appUser(){
        return $this->belongsTo(User::class,'doctor_id','id'); //salah sbb doctor id dekat appointment tak sama id di user
    }
    //relation between appointment with doctor
    public function docApp(){
        return $this->belongsTo(doctor::class,'doctor_id','id');
    }
}
