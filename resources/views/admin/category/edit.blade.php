<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category</b>
            <b style="float: right;">
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-4">
                    <div class="card">
                        <h5 class="card-header">Edit Category</h5>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="category_name">Update Category Name</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" placeholder="Update Category Name" value="{{ $categories->category_name }}">
                                        @error('category_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

  </x-app-layout>