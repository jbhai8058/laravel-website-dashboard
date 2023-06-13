<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
            <b style="float: right;"></b>
        </h2>
    </x-slot>

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
                        <h5 class="card-header">All Category</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">User No</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->user->id}}</td>
                                            <td>{{$category->user->name}}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger">No Data set</span>
                                                @else
                                                    {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i> Actions
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="{{url('category/edit/'.$category->id)}}"><i class="fas fa-edit"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{url('softdelete/category/'.$category->id)}}"><i class="fas fa-trash"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="m-1">
                                    {{$categories->links()}}
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <h5 class="card-header">Add Category</h5>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" placeholder="Category Name">
                                    @error('category_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary "><i class="fas fa-plus"></i> Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <h5 class="card-header">Trash List</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr #</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashCat as $category)
                                    <tr>
                                        <th scope="row">{{$trashCat->firstItem()+$loop->index}}</th>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->user->id}}</td>
                                        <td>{{$category->user->name}}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-danger">No Data set</span>
                                            @else
                                                {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('category/restore/'.$category->id) }}"><i class="fas fa-trash-restore"></i> Restore</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('pdelete/category/'.$category->id) }}"><i class="fas fa-trash"></i> Permanent Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="m-1">
                                {{ $trashCat->links() }}
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>