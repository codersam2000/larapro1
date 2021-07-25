@extends('admin.components.layout')
@section('title')
Manage Posts
@endsection
@section('content')
   <h4 class="py-3"> Manage Posts</h4>
   @if(session()->has('message'))
   <div class="alert alert-{{session('type')}}">{{ session('message') }}</div>
   @endif
    <table class="table table-bordered table-striped">
        <tr>
            <th>SL No</th>
            <th>Image</th>
            <th>Title</th>
            <th>User</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><img src="{{ asset('uploads/images/'.$post->image) }}" alt="{{$post->name}}" height="77" width="77"></td>
            <td>
            <h4>{{ $post->title }}</h4>
            <p>{{ Str::limit($post->des,50) }}</p>
            </td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ ucfirst($post->status) }}</td>
            <td>
                <a href="{{ route('admin.post.show', $post->id) }}" style="disply:inline-block" class="btn"><i class="fas fa-eye"></i></a>
                <a href="{{ route('admin.post.edit', $post->id) }}" style="disply:inline-block" class="btn"><i class="fas fa-pen"></i></a>
                <form action="{{ route('admin.post.delete', $post->id) }}" style="disply:inline-block" class="" style="display:inline-block;" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
@endsection