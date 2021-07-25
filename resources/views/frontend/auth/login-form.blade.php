@extends('frontend.components.layout')
@section('title')
Login
@endsection
@section('content')
<form method="POST" action="{{ route('user.login') }}">
@if(session('message'))
<div class="alert alert-danger">{{ session('message') }}</div>
@endif
@csrf
  <fieldset>
    <legend>Login</legend>
   
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}">
      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
        <label class="form-check-label" for="disabledFieldsetCheck">
          Remember me.
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
@endsection