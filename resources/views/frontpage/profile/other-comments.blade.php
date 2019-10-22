@extends('frontpage.profile.layouts')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Other comments on {{ $auth_user->name }}'s Posts</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>User</th>
                                <th>Post</th>
                                <th>Content</th>
                                <th>Updated at</th>
                                
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->user->name }}</td>
                                    <td><a href="{{ route('front.posts.show', ['id' => $comment->post->id]) }}">{{ $comment->post->title }}</a></td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->updated_at }}</td>
                                    
                                    
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

                                                      