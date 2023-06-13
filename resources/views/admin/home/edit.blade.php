
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Edit Home About</h5>
                        <div class="card-body">
                            <form action="{{ url('about/update/'.$homeabout->id) }}" method="POST" >
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="title">Update Home About Title</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Update Home About Title" value="{{ $homeabout->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="short_dis">Update Short Description</label>
                                    <div>
                                        <textarea rows="3" class="form-control @error('short_dis') is-invalid @enderror" id="short_dis" name="short_dis" placeholder="Update Short Description">{{ $homeabout->short_dis }}</textarea>
                                        @error('short_dis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="long_dis">Update Long Description</label>
                                    <div>
                                        <textarea rows="3" class="form-control @error('long_dis') is-invalid @enderror" id="long_dis" name="long_dis" placeholder="Update Long Description">{{ $homeabout->long_dis }}</textarea>
                                        @error('long_dis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Update About</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection