@extends('admin.components.layout')
@section('title')
    Category Detail
@endsection
@section('content')
   <h4 class="py-3">Category Detail</h4>

    <table class="table table-bordered table-striped">
        <tr>
            <td>Name</td>
            <td>{{ $cat->name }}</td>
        </tr>
        <tr>
            <td>ID</td>
            <td>{{$cat->id}}</td>
        </tr>
        <tr>
            <td>Slug</td>
            <td>{{$cat->slug}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{$cat->status}}</td>
        </tr>
    </table>
    
    
@endsection