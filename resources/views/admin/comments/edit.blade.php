@extends('layouts.main')

@section('title', 'Edit comment')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit comment
                <small>{{ $comment->id }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <form action="{{ route('admin.comments.update', ['comment' => $comment->id]) }}" method="POST">
                @csrf
                @method('PATCH')
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
                    <textarea name="content" id="content" class="form-control" disabled>{{ $comment->content }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="is_active">Active?</label>
                    <div class="radio">
                        <label for="is_active_yes">
                            <input type="radio" value="true" name="is_active" id="is_active_yes" {{ $comment->is_active == true ? 'checked' : '' }}>
                            Yes
                        </label>
                    
                    </div>
                    <div class="radio">
                        <label for="is_active_no">
                            <input type="radio" value="false" name="is_active" id="is_active_no" {{ $comment->is_active == false ? 'checked' : '' }}>
                            No
                        </label>
                    </div>

                </div>
                <button class="btn btn-primary">Submit</button>
                
                
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection