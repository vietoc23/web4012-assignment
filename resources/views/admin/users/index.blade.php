@extends('layouts.main')

@section('title', 'User Management')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Management
                <small>Listing all users</small>
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
                        <h3 class="box-title">All Users</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Posts</th>
                                    <th>Comments</th>
                                    <th><a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->birthday }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role == 1 ? 'user' : 'admin'}}</td>
                                        <td>{{ $user->is_active == true ? 'yes' : 'no' }}</td>
                                        <td>{{ count($user->posts) }}</td>
                                        <td>{{ count($user->comments) }}</td>
                                        <td class="row">
                                            <span class="col-xs-6">
                                                <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </span>
                                        
                                            <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
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