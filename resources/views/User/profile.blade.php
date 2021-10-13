@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @if (Auth::user()->role->name=="doctor")
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">User Profile</div>

                        <div class="card-body text-center">
                            <img src="{{ asset('uploads/profile/'.Auth::user()->image) }}" style="background-size: cover; border-radius: 999px; height: 150px; width: 150px; margin: 0 auto 20px auto" class="card-img-top" class="img-fluid rounded" class="" alt="...">
                            <p>Name :{{auth()->user()->name}}</p>
                            <p>E-mail :{{auth()->user()->email}}</p>
                            <p>Address :{{auth()->user()->address}}</p>
                            <p>Phone Number :{{auth()->user()->phone_number}}</p>

                        </div>
                    </div>
                </div>
            @endif --}}
            <div class="col-md-6 mb-3">
                @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header">Update Profile</div>
                    <div class="card-body">
                        <form action="{{ url('/user-profile-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                                
                            </div>
                            
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                                
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                                
                            </div>
                            @if (Auth::user()->role->name=="doctor")
                                <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" name="image" class="form-control" value="">
                                    
                                </div>
                            @endif
                            <div class="form-group">
                                
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                            
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>    
    
@endsection
