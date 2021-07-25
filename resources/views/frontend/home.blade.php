@extends('frontend.components.layout')
@section('title')
    Blog Home Page
@endsection
@section('content')
<article>
@if($posts)
@foreach($posts as $post)
    <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">{{$post->created_at->diffForHumans()}} By {{$post->user->name}}</div>
        <!-- Post categories-->
        <a class="badge bg-secondary text-decoration-none link-light" href="{{route('category.post',$post->category_id)}}">{{  $post->category->name }}</a>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('uploads/images/'.$post->image) }}" alt="{{ $post->title }}" /></figure>
    <!-- Post content-->
    <section class="mb-5">
        <p class="fs-5 mb-4">{!!Str::limit($post->des,100)!!}<a href="{{ route('single.post',$post->slug) }}">learn more</a>
    </section>
@endforeach
@endif    
</article>
{{ $pagination->links() }}
@endsection