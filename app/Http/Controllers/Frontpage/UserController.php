<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Requests\Admin\UserCommentRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserProfileRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if(Auth::check()) {
            return view('frontpage.profile.index');
        }
    }

    public function updateProfile(UserProfileRequest $request)
    {
        if(Auth::check()) {
            $user = Auth::user();

            $user->update($request->all());

            return view('frontpage.profile.index');
        }
    }

    public function showPosts()
    {
        $posts = Post::with(['comments', 'category'])->where('user_id', Auth::id())->get();

        return view('frontpage.profile.posts', [
            'posts' => $posts
        ]);
    }

    public function showComments()
    {
        $comments = Comment::with('post')->where('user_id', Auth::id())->get();

        return view('frontpage.profile.comments', [
            'comments' => $comments
        ]);
    }

    public function showOtherComments()
    {
        $posts = Post::where('user_id', Auth::id())->pluck('id');
        $comments = Comment::with('post')->whereIn('post_id', $posts)->orderBy('updated_at', 'desc')->get();
        return view('frontpage.profile.other-comments', [
            'comments' => $comments
        ]);
    }

    public function createPost()
    {
        $categories = Category::all();

        return view('frontpage.profile.create-post', [
            'categories' => $categories
        ]);
    }

    public function storePost(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('front.index');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('frontpage.profile.edit-post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function updatePost(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('user.posts');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function editComment($id)
    {
        $comment = Comment::find($id);
        $posts = Post::all();

        return view('frontpage.profile.edit-comment', [
            'comment' => $comment,
            'posts' => $posts
        ]);
    }

    public function updateComment(UserCommentRequest $request, $id)
    {
        $comment = Comment::find($id);

        $comment->update([
            'content' => $request->content
        ]);

        return redirect()->route('user.comments');
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->route('user.comments');
    }

    public function changePasswordForm()
    {
        return view('frontpage.profile.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->all();
  
        $user = User::find(auth()->user()->id);
    
        if(!\Hash::check($data['old_password'], $user->password)){
    
            return back()->with('oldPwdError','You have entered wrong password');
    
        }else{
    
            $user->password = bcrypt($data['new_password']);

            return redirect()->route('user.show-profile');
        }
    }
}
