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
                            <h3>Home Slider</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('add.slider')}}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Add Slider</a>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">All Slider</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">Slider Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td><img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" style="height: 70px; width: 100px;"></td>
                                        <td>
                                            @if($slider->created_at == NULL)
                                                <span class="text-danger">No Data set</span>
                                            @else
                                                {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('slider/edit/'.$slider->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('delete/slider/'.$slider->id) }}" onclick="return confirm('Are you sure to Delete?')"><i class="fas fa-trash"></i> Delete</a></li>
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