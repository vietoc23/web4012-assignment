@extends('frontpage.main')

@section('title', 'Posts in category')

@section('content')
<div class="col-md-8">

  <h1 class="my-4">Bloggggg
    <small>Posts in {{ $posts[0]->category->name }}</small>
  </h1>

  <!-- Blog Post -->
  <div class="row">
      <div class="col-md-12">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Updated at</th>
                    <th>Comments</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('front.posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ count($post->comments) }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
  </div>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/blog-home.css') }}">
@endpush