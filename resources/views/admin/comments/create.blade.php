@extends('layouts.main')

@section('title', 'Add new comment')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new comment
                <small>Add new comment</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <form action="{{ route('admin.comments.store') }}" method="POST">
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
                    <label for="post">Post</label>
                    <select name="post_id" id="post" class="form-control">
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                </div>
                
                <button class="btn btn-primary">Submit</button>
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection