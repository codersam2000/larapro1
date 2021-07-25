@extends('admin.components.layout')
@section('title')
   Add new post
@endsection
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
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
    <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
      <div class="card my-3">
        <div class="card-header">
          Edit post
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" name="title" placeholder="Write title" id="name" value="{{$post->title}}">
              <textarea class="form-control mt-3" style="height:200px" name="des">{{$post->des}}</textarea>
            </div>
        </div>
        <div class="card-footer">
          
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card my-3">
        <div class="card-header">
          Options
        </div>
        <div class="card-body">
            <div class="form-group">
              <label>Select Category</label>
              <select name="category_id" class="form-control mt-2">
                @if($categories)
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == $post->category->id ? 'selected':'' }} >{{$category->name}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <div class="form-goup mt-3">
            <label for="img">
              Choose a photo <br>
            <img class="img-pv p-1" style="width:200px;height:auto; amrgin:auto;" src="{{ asset('uploads/images/'.$post->image) }}"/>
            </label>
            <input type="file" name="image" onchange="previ(event)" class="hide" id="img"/>
            </div>
            <div class="form-group mt-3">
              <label>Satus</label> <br>
                <div class="custom-radio custom-control custom-control-inline">
                  <input type="radio" class="custom-control-label" name="status" id="active" value="active" {{$post->status == 'active'?'checked':''}}>
                  <label for="active" class="custom-control-label">Active</label>
                </div>
                <div class="custom-radio custom-control custom-control-inline">
                  <input type="radio" class="custom-control-label" name="status" id="inactive" value="inactive" {{$post->status == 'inactive'?'checked':''}}>
                  <label for="inactive" class="custom-control-label">Inactive</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary pull-right" value="Publice">
        </div>
      </div>
      </form>
      <script>

        const img_pv = document.querySelector('.img-pv'); 
        function previ(){
          img_pv.src = URL.createObjectURL(event.target.files[0]);
        }
      </script>
    </div>
  </div>
@endsection