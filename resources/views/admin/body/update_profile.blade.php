@extends('admin.admin_master')

@section('admin')
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
    <h5 class="card-header">User Profile Update</h5>
    <div class="card-body">
    <form method="POST" action="{{route('update.user.profile')}}">
        @csrf
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" name="name" value="{{$user['name']}}">
        </div>
        <div class="form-group">
            <label for="email">User Email</label>
            <input type="email" class="form-control" name="email" value="{{$user['email']}}">
        </div>
    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
  </div>
</div>

@endsection