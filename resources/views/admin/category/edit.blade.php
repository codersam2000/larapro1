@extends('admin.components.layout')
@section('title')
  Edit category
@endsection
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6">
    @if(session('message'))
      <div class="alert alert-{{session('type')}}">{{ session('message') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div> 
    @endif
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
      <div class="card my-3">
        <div class="card-header">
          Edit category
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter category name" id="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
            <label>Satus</label> <br>
              <div class="custom-radio custom-control custom-control-inline">
                <input type="radio" class="custom-control-label" name="status" id="active" value="active" {{ $category->status=='active'?'checked':'' }} checked>
                <label for="active" class="custom-control-label">Active</label>
              </div>
              <div class="custom-radio custom-control custom-control-inline">
                <input type="radio" class="custom-control-label" name="status" id="inactive" value="inactive" {{ $category->status=='inactive'?'checked':'' }}>
                <label for="inactive" class="custom-control-label">Inactive</label>
              </div>
            </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary pull-right" value="update">
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection