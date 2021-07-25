@extends('frontend.components.layout')
@section('title')
    Single Post
@endsection
@section('content')
<article>

<header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1">{{ $posts->title }}</h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">{{$posts->created_at->diffForHumans()}} By {{$posts->user->name}}</div>
        <!-- Post categories-->
        <a class="badge bg-secondary text-decoration-none link-light" href="{{route('category.post',$posts->category_id)}}">{{ $posts->category->name }}</a>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('uploads/images/'.$posts->image) }}" alt="{{ $posts->title }}" /></figure>
    <!-- Post content-->
    <section class="mb-5">
        <p class="fs-5 mb-4">{!!$posts->des!!}</p>
    </section>

</article>
@endsection