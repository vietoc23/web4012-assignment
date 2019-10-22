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
                    <form action="{{ route('user.posts.update', ['id' => $post->id]) }}" method="POST">
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
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)
                                    
                                    <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>

                        </div>
                        
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

                                                      