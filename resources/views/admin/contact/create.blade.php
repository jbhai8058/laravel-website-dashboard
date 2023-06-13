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
                        <h5 class="card-header">Add Contact </h5>
                        <div class="card-body">
                            <form action="{{ route('store.contact') }}" method="POST">
                                @csrf
                                
                                <div class="form-group mb-2">
                                    <label for="email">Contact Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="phone">Contact Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="address">Contact Address </label>
                                    <textarea rows="3" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address"></textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-primary "><i class="fas fa-plus"></i> Add Contact</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection