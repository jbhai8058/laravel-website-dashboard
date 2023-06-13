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
                </div>

                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Add Home About</h5>
                        <div class="card-body">
                            <form action="{{ route('store.about') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="title">Title </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="short_dis">Short Description</label>
                                    <textarea rows="3" class="form-control @error('short_dis') is-invalid @enderror" name="short_dis" id="short_dis"></textarea>
                                    @error('short_dis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="long_dis">Long Description</label>
                                    <textarea rows="5" class="form-control @error('long_dis') is-invalid @enderror" name="long_dis" id="long_dis"></textarea>
                                    @error('long_dis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-primary "><i class="fas fa-plus"></i> Add About</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection