<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand</b>
            <b style="float: right;">
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-4">
                    <div class="card">
                        <h5 class="card-header">Edit Brand</h5>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image}}">
                                <div class="form-group mb-2">
                                    <label for="brand_name">Update Brand Name</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name" placeholder="Update Brand Name" value="{{ $brands->brand_name }}">
                                        @error('brand_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="brand_image">Update Brand Image</label>
                                    <div class="">
                                        <input type="file" class=" @error('brand_image') is-invalid @enderror" id="brand_image" name="brand_image" placeholder="Update Brand Image" value="{{ $brands->brand_image }}">
                                        @error('brand_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset('storage/' . $brands->brand_image) }}" style="width: 200px;height:200px;">
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

  </x-app-layout>