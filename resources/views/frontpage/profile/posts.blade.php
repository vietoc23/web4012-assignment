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
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Updated at</th>
                                <th>Comments</th>
                                <th><a href="{{ route('user.posts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('front.posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>{{ count($post->comments) }}</td>
                                    <td class="row">
                                        <span class="col-xs-6">
                                            <a href="{{ route('user.posts.edit', ['id' => $post->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </span>
                                    
                                        <form action="{{ route('user.posts.delete', ['id' => $post->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
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
    </div>
</div>

@endsection

                                                      