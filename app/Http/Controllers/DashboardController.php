<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	if(Auth::user()->role->name=='patient'){
    		return view('home');
    	}
        $appointments=Appointment::where('date',date('Y-m-d'))->where('status',0)->where('doctor_id',auth()->user()->id)->get();
    	return view('admin.doctor.dashboard',compact('appointments'));
    }
}
//checking doc patient for each doc