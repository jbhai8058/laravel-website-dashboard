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
                        <h5 class="card-header">All MultiPics</h5>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    @foreach ($images as $multiPic)
                                        <div class="col-md-4">
                                            <!-- <div class="card">
                                                <img class="card-img-top" src="{{ asset('storage/' . $multiPic->image) }}" alt="Image">
                                                
                                            </div> -->
                                            <div class="card-deck">
                                                <a href="{{ asset('storage/' . $multiPic->image) }}" target="_blank" class="card">
                                                    <img class="card-img-top" src="{{ asset('storage/' . $multiPic->image) }}" alt="Image 1">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <h5 class="card-header">Add Multi Images</h5>
                        <div class="card-body">
                            <form action="{{ route('store.image')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group mb-2">
                                    <label for="image">Brand Image</label>
                                    <input type="file" class="@error('image') is-invalid @enderror" name="image[]" id="image" multiple >
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-primary "><i class="fas fa-plus"></i> Add image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection