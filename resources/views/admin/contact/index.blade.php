@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-message">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                        <div class="col-8">
                            <h3>Contact Page</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('add.contact')}}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Add Contact</a>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">All Conatct Data</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">Contact Address</th>
                                            <th scope="col">Contact Email</th>
                                            <th scope="col">Contact Phone</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($contacts as $con)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$con->address}}</td>
                                        <td>{{$con->email}}</td>
                                        <td>{{$con->phone}}</td>
                                        <td>
                                            @if($con->created_at == NULL)
                                                <span class="text-danger">No Data set</span>
                                            @else
                                                {{Carbon\Carbon::parse($con->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('admin/contact/edit/'.$con->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('admin/contact/delete/'.$con->id) }}" onclick="return confirm('Are you sure to Delete?')"><i class="fas fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection