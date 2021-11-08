@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    List Patients
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th class="nosort">Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>status</th>
                                    <th class="nosort">&nbsp;</th>
                                    <th class="nosort">&nbsp;</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td><img src="\img\user1.png" class="table-user-thumb" alt=""></td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->user->email }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        @if ($appointment->status==0)
                                            <td>not checked</td>
                                        @elseif ($appointment->status==2)
                                            <td>Cancelled</td>
                                        @else
                                            <td>checked</td>
                                        @endif
                                        <td>
                                            <div class="table-actions">
                                                
                                               @if($appointment->prescription==null && $appointment->status!=2)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $appointment->user_id }}">
                                                    Write prescription
                                                </button>
                                                @include('admin.doctor.prescription')
                                                @elseif ($appointment->status==2)
                                                    <button type="button" class="btn btn-danger">
                                                        Cancelled
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{ $appointment->user_id }}" >View prescription</button>
                                                {{-- @include('') --}}
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h5>You have no appointments Today.</h5>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection