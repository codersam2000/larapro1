@extends('admin.components.layout')
@section('title')
   anage
@endsection
@section('content')
   <h4 class="py-3"> Manage category</h4>
   @if(session()->has('message'))
   <div class="alert alert-{{session('type')}}">{{ session('message') }}</div>
   @endif
    <table class="table table-bordered table-striped">
        <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ ucfirst($category->status) }}</td>
            <td>
                <a href="{{ route('admin.category.show', $category->id) }}" class="btn"><i class="fas fa-eye"></i></a>
                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn"><i class="fas fa-pen"></i></a>
                <form action="{{ route('admin.category.delete', $category->id) }}" class="" style="display:inline-block;" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $categories->links() }}
@endsection