@extends('layouts.main')

@section('title', 'Edit category')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit category
                <small>{{ $category->name }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
                </div>
                
                
                {{-- <button class="btn btn-primary">Submit</button> --}}
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection