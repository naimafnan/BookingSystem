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
        $user->address=$request->input('address');
        $user->phone_number=$request->input('phone_number');

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

