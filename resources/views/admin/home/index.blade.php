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
                            <h3>Home About</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('add.about')}}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Add Home About</a>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Home About</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">Home Title</th>
                                            <th scope="col">Short Description</th>
                                            <th scope="col">Long Description</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($homeabout as $about)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$about->title}}</td>
                                        <td>{{$about->short_dis}}</td>
                                        <td>{{$about->long_dis}}</td>
                                        <td>
                                            @if($about->created_at == NULL)
                                                <span class="text-danger">No Data set</span>
                                            @else
                                                {{Carbon\Carbon::parse($about->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('about/edit/'.$about->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Are you sure to Delete?')"><i class="fas fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="m-1">
                                    {{$homeabout->links()}}
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection