@extends('layouts.main')

@section('title', 'Comment Management')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Comment Management
                <small>Listing all comments</small>
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
                        <h3 class="box-title">All Comments</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Post</th>
                                    <th>Content</th>
                                    <th>Created by</th>
                                    <th>Active?</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    
                                    <th><a href="{{ route('admin.comments.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></th>
                                </tr>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td><a href="{{ route('admin.comments.show', ['comment' => $comment->id]) }}">{{ $comment->post->title }}</a></td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->is_active == true ? 'yes' : 'no' }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>{{ $comment->updated_at }}</td>
                                        
                                        <td class="row">
                                            <span class="col-xs-6">
                                                <a href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </span>
                                        
                                            <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
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