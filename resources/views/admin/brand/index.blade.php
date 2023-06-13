@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                    <div class="card">
                        <h5 class="card-header">All Brand</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">User No</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Brand Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                        <td>{{$brand->user->id}}</td>
                                        <td>{{$brand->brand_name}}</td>
                                        <td><img src="{{ asset('storage/' . $brand->brand_image) }}" alt="Brand Image" style="height: 70px; width: 70px;"></td>
                                        <td>
                                            @if($brand->created_at == NULL)
                                                <span class="text-danger">No Data set</span>
                                            @else
                                                {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('brand/edit/'.$brand->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('delete/brand/'.$brand->id) }}" onclick="return confirm('Are you sure to Delete?')"><i class="fas fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="m-1">
                                    {{$brands->links()}}
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <h5 class="card-header">Add Brand</h5>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name" placeholder="Brand Name">
                                    @error('brand_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" class="@error('brand_image') is-invalid @enderror" name="brand_image" id="brand_image">
                                    @error('brand_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-primary "><i class="fas fa-plus"></i> Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection