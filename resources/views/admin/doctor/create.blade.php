@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
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
                        <div class="col-lg-6 mb-3">
                            <label for="">Career</label>
                            <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="doctor highest degree" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Clinic Name</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Service</label>
                            <select class="form-control">
                                <option value="">Please select role</option>
                                <option value="Fomema Examinations">Fomema Examinations</option>
                                <option value="X-ray">X-ray</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Address 1</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="">Address 2</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Address 3</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="">Address 4</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Postcode</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="">State</label>
                            <select name="STATE" id="STATE" class="form-control" onchange="change_state();" required="">
                                <option value="">Select State</option>
                                <option value="JOHOR">JOHOR</option>
                                <option value="KEDAH">KEDAH</option>
                                <option value="KELANTAN">KELANTAN</option>
                                <option value="KUALA LUMPUR">KUALA LUMPUR</option>
                                <option value="MELAKA">MELAKA</option>
                                <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                                <option value="PAHANG">PAHANG</option>
                                <option value="PERAK">PERAK</option>
                                <option value="PERLIS">PERLIS</option>
                                <option value="PULAU PINANG">PULAU PINANG</option>
                                <option value="SABAH">SABAH</option>
                                <option value="SARAWAK">SARAWAK</option>
                                <option value="TERENGGANU">TERENGGANU</option>
                                <option value="SELANGOR">SELANGOR</option>
                                <option value="PUTRAJAYA">PUTRAJAYA</option>
                                <option value="LABUAN">LABUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control "  placeholder="Upload Image" name="image">
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

@endsection