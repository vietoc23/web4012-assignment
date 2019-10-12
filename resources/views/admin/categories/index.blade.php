@extends('layouts.main')

@section('title', 'Category Management')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category Management
                <small>Listing all categories</small>
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
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created by</th>
                                    <th>Posts</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    
                                    <th><a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>{{ count($category->posts) }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        
                                        <td class="row">
                                            <span class="col-xs-6">
                                                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </span>
                                        
                                            <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
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