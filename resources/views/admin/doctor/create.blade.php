@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                {{-- <div class="card"> --}}
                    {{-- <div class="card-body"> --}}
                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data" >@csrf
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="">Full name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="doctor name" value="">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email"value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="doctor password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="">Education</label>
                                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="doctor highest degree" value="">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                                        <span class="input-group-append">
                                    
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="">Please select role</option>
                                        @foreach(App\Models\Role::where('name','!=','patient')->get() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection