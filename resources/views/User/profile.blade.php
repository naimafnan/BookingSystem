@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->name}}">
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
