@extends('frontpage.profile.layouts')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ $auth_user->name }}'s Comments</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Post</th>
                                <th>Content</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td><a href="{{ route('front.posts.show', ['id' => $comment->post->id]) }}">{{ $comment->post->title }}</a></td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->updated_at }}</td>
                                    
                                    <td class="row">
                                        <span class="col-xs-6">
                                            <a href="{{ route('user.comments.edit', ['id' => $comment->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </span>
                                    
                                        <form action="{{ route('user.comments.delete', ['id' => $comment->id]) }}" method="POST" class="col-xs-6" onsubmit="return confirm('Are you sure?');">
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

                                                      