@extends('frontend.components.layout')
@section('title')
Registation
@endsection
@section('content')
<form method="POST" action="{{ route('user.registation') }}" enctype="multipart/form-data">
@if(session('message'))
<div class="alert alert-{{session('type')}}">{{ session('message') }}</div>
@endif
@csrf
  <fieldset>
    <legend>Ragistation</legend>
   
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
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
      <label for="disabledSelect" class="form-label">Confirm password</label>
      <input type="password" name="password_confirmation" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Photo</label>
      <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
      @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
        <label class="form-check-label" for="disabledFieldsetCheck">
          Can't check this
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
@endsection