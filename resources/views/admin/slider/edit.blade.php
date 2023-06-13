
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Edit Slider</h5>
                        <div class="card-body">
                            <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $sliders->image}}">
                                <div class="form-group mb-2">
                                    <label for="title">Update Slider Title</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Update Slider Title" value="{{ $sliders->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Update Slider Description</label>
                                    <div>
                                        <textarea rows="3" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Update Slider Description">{{ $sliders->description }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group mb-2">
                                    <label for="image">Update Slider Image</label>
                                    <div class="">
                                        <input type="file" class=" @error('image') is-invalid @enderror" id="image" name="image" placeholder="Update Brand Image" value="{{ $sliders->image }}">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset('storage/' . $sliders->image) }}" style="width: 400px;height:200px;">
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Update Slider</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection