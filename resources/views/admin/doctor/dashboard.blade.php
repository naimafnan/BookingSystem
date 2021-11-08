@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            @if (Auth::user()->role->name=="Admin")
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Patients</h6>
                                    {{-- <h2>{{app\Models\Appointment::where('date',date('Y-m-d'))->where('status',0)->where('doctor_id',auth()->user()->id)->count()}}</h2> --}}
                                    {{app\Models\User::where('role_id',3)->count()}}
                                </div>
                                <div class="icon">
                                    <i class="ik ik-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role->name=="Admin")
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    {{-- berapa patient dr for today --}}
                                    <h6>Doctors</h6>
                                    <h2>{{app\Models\User::where('role_id',2)->count()}}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-user-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total Patient</h6>
                                <h2>{{app\Models\Appointment::where('doctor_id',auth()->user()->id)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-injured"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Today Patient</h6>
                                <h2>{{app\Models\Appointment::where('date',date('Y-m-d'))->where('status',0)->where('doctor_id',auth()->user()->id)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-procedures"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Appoinments</h6>
                                <h2>{{app\Models\Appointment::where('date',date('Y-m-d'))->where('status',1)->where('doctor_id',auth()->user()->id)->count()}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection