@extends('frontpage.profile.layouts')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ $auth_user->name }}'s Posts</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user.comments.update', ['id' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                            <label for="post">Post</label>
                            <select name="post_id" id="post" class="form-control" disabled>
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" {{ $post->id === $comment->post_id ? 'selected' : '' }}>{{ $post->title }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control">{{ old('content', $comment->content) }}</textarea>
                        </div>
                        
                        
                        <button class="btn btn-primary">Submit</button>
                        
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

                                                      