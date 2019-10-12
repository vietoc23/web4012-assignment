@extends('layouts.main')

@section('title', 'Post Management')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post Management
                <small>Listing all posts</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Posts</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Created by</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Comments</th>
                                    <th><a href="{{ route('admin.posts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></th>
                                </tr>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ substr($post->content, 0, 150) . '...' }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td>{{ count($post->comments) }}</td>
                                        <td class="row">
                                            <span class="col-xs-6">
                                                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </span>
                                        
                                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection