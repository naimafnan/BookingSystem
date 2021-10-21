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
            <div class="col-lg-8 mb-3">
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
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->name}}" placeholder="Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="address1" class="form-control" value="{{auth()->user()->address1}}" placeholder="Address 1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="address2" class="form-control" value="{{auth()->user()->address2}}" placeholder="Address 2">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="address3" class="form-control" value="{{auth()->user()->address3}}" placeholder="Address 3">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="address4" class="form-control" value="{{auth()->user()->address4}}" placeholder="Address 4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="postcode" class="form-control @error('address') is-invalid @enderror" placeholder="Postcode"  value="{{auth()->user()->postcode}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select name="state" id="STATE" class="form-control" onchange="change_state();">
                                        <option value="">Select State</option>
                                        <option value="Johor">JOHOR</option>
                                        <option value="Kedah">KEDAH</option>
                                        <option value="Kelantan">KELANTAN</option>
                                        <option value="Kuala Lumpur">KUALA LUMPUR</option>
                                        <option value="Melaka">MELAKA</option>
                                        <option value="Negeri Sembilan">NEGERI SEMBILAN</option>
                                        <option value="Pahang">PAHANG</option>
                                        <option value="Perak">PERAK</option>
                                        <option value="Perlis">PERLIS</option>
                                        <option value="Pulau Pinang">PULAU PINANG</option>
                                        <option value="Sabah">SABAH</option>
                                        <option value="Sarawak">SARAWAK</option>
                                        <option value="Terengganu">TERENGGANU</option>
                                        <option value="Selangor">SELANGOR</option>
                                        <option value="Putrajaya">PUTRAJAYA</option>
                                        <option value="Labuan">LABUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}" placeholder="Phone number">
                                
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
