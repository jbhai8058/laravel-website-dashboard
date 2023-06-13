
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Edit Contact</h5>
                        <div class="card-body">
                            <form action="{{ url('admin/contact/update/'.$contacts->id) }}" method="POST" >
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="email">Update Contact Email</label>
                                    <div class="">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Update Contact Email" value="{{ $contacts->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="phone">Update Contact Phone</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Update Contact Phone" value="{{ $contacts->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="address">Update Contact Address</label>
                                    <div>
                                        <textarea rows="3" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Update Contact Address">{{ $contacts->address }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Update Contact</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection