@extends('layouts.main')

@section('title', 'Edit user')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit user
                <small>{{ $user->name }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
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
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" class="form-control" id="birthday"  value="{{ old('birthday', $user->birthday) }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" class="form-control" id="phone"  value="{{ old('phone', $user->phone) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div> --}}
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Active?</label>
                    <div class="radio">
                        <label for="is_active_yes">
                            <input type="radio" value="true" name="is_active" id="is_active_yes" {{ $user->is_active == true ? 'checked' : '' }}>
                            Yes
                        </label>
                    
                    </div>
                    <div class="radio">
                        <label for="is_active_no">
                            <input type="radio" value="false" name="is_active" id="is_active_no" {{ $user->is_active == false ? 'checked' : '' }}>
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