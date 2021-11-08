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
                                    <input type="text" name="postcode" class="form-control @error('address') is-invalid @enderror" placeholder="Postcode"  value="{{auth()->user()->postcode}}" maxlength="5">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select name="state" id="STATE" class="form-control" onchange="change_state();">
                                        <option value="">Select State</option>
                                        <option value="Johor" {{ auth()->user()->state == "Johor" ? 'selected' : '' }}>JOHOR</option>
                                        <option value="Kedah" {{ auth()->user()->state == "Kedah" ? 'selected' : '' }}>KEDAH</option>
                                        <option value="Kelantan" {{ auth()->user()->state == "Kelantan" ? 'selected' : '' }}>KELANTAN</option>
                                        <option value="Kuala Lumpur" {{ auth()->user()->state == "Kuala Lumpur" ? 'selected' : '' }}>KUALA LUMPUR</option>
                                        <option value="Melaka" {{ auth()->user()->state == "Melaka" ? 'selected' : '' }}>MELAKA</option>
                                        <option value="Negeri Sembilan" {{ auth()->user()->state == "Negeri Sembilan" ? 'selected' : '' }}>NEGERI SEMBILAN</option>
                                        <option value="Pahang" {{ auth()->user()->state == "Pahang" ? 'selected' : '' }}>PAHANG</option>
                                        <option value="Perak" {{ auth()->user()->state == "Perak" ? 'selected' : '' }}>PERAK</option>
                                        <option value="Perlis" {{ auth()->user()->state == "Perlis" ? 'selected' : '' }}>PERLIS</option>
                                        <option value="Pulau Pinang" {{ auth()->user()->state == "Pulau Pinang" ? 'selected' : '' }}>PULAU PINANG</option>
                                        <option value="Sabah" {{ auth()->user()->state == "Sabah" ? 'selected' : '' }}>SABAH</option>
                                        <option value="Sarawak" {{ auth()->user()->state == "Sarawak" ? 'selected' : '' }}>SARAWAK</option>
                                        <option value="Terengganu" {{ auth()->user()->state == "Terengganu" ? 'selected' : '' }}>TERENGGANU</option>
                                        <option value="Selangor" {{ auth()->user()->state == "Selangor" ? 'selected' : '' }}>SELANGOR</option>
                                        <option value="Putrajaya" {{ auth()->user()->state == "Putrajaya" ? 'selected' : '' }}>PUTRAJAYA</option>
                                        <option value="Labuan" {{ auth()->user()->state == "Labuan" ? 'selected' : '' }}>LABUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}" placeholder="Phone number">
                                </div>
                                @if (Auth::user()->role->name=="doctor")
                                    <div class="col-md-6 mb-3">
                                        <select name="service" id="service" class="form-control" onchange="change_state();">
                                            <option value="">Select Service</option>
                                            <option value="Fomema Examinations" {{ auth()->user()->doctorDetails->doc_service == "Fomema Examinations" ? 'selected' : '' }}>Fomema Examinations</option>
                                            <option value="X-Ray" {{ auth()->user()->doctorDetails->doc_service == "X-Ray" ? 'selected' : '' }} >X-Ray</option>
                                            {{-- listed service for each role --}}
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                @if (Auth::user()->role->name=="doctor")
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="clinicname" class="form-control" value="{{auth()->user()->doctorDetails->cli_name ?? ''}}" placeholder="clinic Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="specialist" class="form-control" value="{{auth()->user()->doctorDetails->doc_specialist  ?? ''}}" placeholder="Specialist">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                @if (Auth::user()->role->name=="doctor")
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="career" class="form-control" value="{{auth()->user()->doctorDetails->doc_career  ?? ''}}" placeholder="Career">
                                    </div>
                                @endif
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
