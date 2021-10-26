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
        $appointment=Appointment::all();
    	return view('admin.doctor.dashboard',compact('appointment'));
    }
}
