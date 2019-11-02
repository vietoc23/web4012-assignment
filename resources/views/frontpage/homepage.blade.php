@extends('frontpage.main')

@section('title', 'Homepage')

@section('content')
<div class="col-md-8">

  <h1 class="my-4">Bloggggg
    <small>Recent posts</small>
  </h1>

  <!-- Blog Post -->
  @foreach ($posts as $post)
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ substr($post->content, 0, 150) }}</p>
        <a href="{{ route('front.posts.show', ['id' => $post->id]) }}" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted on {{ $post->created_at }} by
        <a href="{{ route('front.user-posts.show', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
      </div>
  
    </div>
  @endforeach

  <!-- Pagination -->
  {{-- <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul> --}}

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/blog-home.css') }}">
@endpush