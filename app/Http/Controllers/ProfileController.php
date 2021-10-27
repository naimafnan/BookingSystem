<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('User.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('User.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id=Auth::user()->id;
        $user=User::findorFail($user_id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        // $user->password=$request->input('password');
        $user->address1=$request->input('address1');
        $user->address2=$request->input('address2');
        $user->address3=$request->input('address3');
        $user->address4=$request->input('address4');
        $user->postcode=$request->input('postcode');
        $user->state=$request->input('state');
        $user->phone_number=$request->input('phone_number');

        // $reserves=User::join("doctors","doctors.user_id","=","users.id")
        //     ->where('role_id','=','2')->get();
        //     $reserves-> cli_name =$request->input('clinic_name');
        //image
        if($request->hasfile('image'))
        {
            $destination='uploads/profile/'.$user->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $extensions=$file->getClientOriginalExtension();
            $filename=time().'.'. $extensions;
            $file->move('uploads/profile/',$filename);
            $user->image=$filename;
        }
        $user->update();
        // $reserves->update();
        return redirect()->back()->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

