@extends('admin.admin_master')

@section('admin')
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-message">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
<div class="card">
    <h5 class="card-header">Change Password</h5>
    <div class="card-body">
    <form method="POST" action="{{route('password.update')}}">
        @csrf
      <!-- Password fields -->
    <div class="form-group">
        <label for="currentPassword">Current Password</label>
        <input type="password" class="form-control" name="oldpassword" id="current_Password" placeholder="Enter current password">
      @error('oldpassword')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
        <label for="newPassword">New Password</label>
        <input type="password" class="form-control" name="password" id="Password" placeholder="Enter new password">
      @error('password')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password">
      @error('password_confirmation')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
  </div>
</div>

@endsection