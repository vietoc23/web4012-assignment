@extends('frontpage.main')

@section('title', 'Posts by user')

@section('content')
<div class="col-md-8">

  <h1 class="my-4">Bloggggg
    <small>Posts by {{ $posts[0]->user->name }}</small>
  </h1>

  <!-- Blog Post -->
  <div class="row">
      <div class="col-md-12">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Updated at</th>
                    <th>Comments</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('front.posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->category->name }}</td>
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