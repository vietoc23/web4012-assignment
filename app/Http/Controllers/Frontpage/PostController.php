<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'category', 'comments'])->orderBy('id', 'desc')->get();

        $categories = Category::all();

        return view('frontpage.homepage', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with(['comments', 'user'])->find($id);
        $categories = Category::all();
        
        return view('frontpage.post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeComment(UserCommentRequest $request)
    {
        Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'is_active' => true
        ]);

        return redirect()->back();
    }

    public function showPostsByUsername($id)
    {
        $posts = Post::with(['comments', 'category', 'user'])->where('user_id', $id)->orderBy('updated_at', 'desc')->get();


        return view('frontpage.posts-by-user', [
            'posts' => $posts
        ]);
    }

    public function showPostsByCategory($id)
    {
        $posts = Post::with(['comments', 'category', 'user'])->where('category_id', $id)->orderBy('updated_at', 'desc')->get();


        return view('frontpage.posts-by-category', [
            'posts' => $posts
        ]);
    }
}
