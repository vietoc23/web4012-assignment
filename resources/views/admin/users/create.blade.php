@extends('layouts.main')

@section('title', 'Add new user')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new user
                <small>Add new user</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" class="form-control" id="birthday">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div> --}}
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" selected>User</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Active?</label>
                    <div class="radio">
                        <label for="is_active_yes">
                            <input type="radio" value="true" name="is_active" id="is_active_yes" checked>
                            Yes
                        </label>
                    
                    </div>
                    <div class="radio">
                        <label for="is_active_no">
                            <input type="radio" value="false" name="is_active" id="is_active_no">
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