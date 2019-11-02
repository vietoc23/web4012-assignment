@extends('frontpage.main')

@section('title', 'Post')


@section('content')
<div class="col-lg-8">

  <!-- Title -->
  <h1 class="mt-4">{{ $post->title }}</h1>

  <!-- Author -->
  <p class="lead">
    by
    <a href="{{ route('front.user-posts.show', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p>Posted on {{ $post->created_at }}</p>

  <hr>

  <!-- Preview Image -->
  {{-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

  <hr> --}}

  <!-- Post Content -->
  <p>
    {{ $post->content }}
  </p>

  <hr>

  @if ($auth_user)
  <!-- Comments Form -->
  <div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form action="{{ route('user.posts.store-comment', ['post_id' => $post->id]) }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
          <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
      
  @endif

  <!-- Single Comment -->
  @foreach ($post->comments as $comment)
    @if ($comment->is_active == true)
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">{{ $comment->user->name }}</h5>
        {{ $comment->content }}
      </div>
    </div>
        
    @endif
      
  @endforeach

  <!-- Comment with nested comments -->
  {{-- <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
      <h5 class="mt-0">Commenter Name</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

      <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>

      <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>

    </div>
  </div> --}}

</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/blog-post.css') }}">
@endpush