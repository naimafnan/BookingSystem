@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    List Patients
                </div>
                <div class="card-body">
                    <table class="table" id="data_table">
                        <thead>
                            <tr>
                                <th class="nosort">Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Phone Number</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $key=>$appointment)
                                <tr>
                                    <td><img src="\img\user1.png" class="table-user-thumb" alt=""></td>
                                    <td>{{ $appointment->user->name }}</td>
                                    <td>{{ $appointment->user->email }}</td>
                                    <td>{{ $appointment->docApp->doc_service }}</td>
                                    <td>{{ $appointment->user->phone_number }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="" data-toggle="modal" data-target="#exampleModal"><i class="ik ik-eye"></i></a>
                                            <a href=""><i class="ik ik-edit-2"></i></a>
                                            <a href=""><i class="ik ik-trash-2"></i></a>
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
@endsection