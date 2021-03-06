<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['posts', 'comments'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create([
            'name' =>$request->name,
            'birthday' =>$request->birthday,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'role' =>$request->role,
            'is_active' =>$request->is_active,
            'password' => '123456'
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', [
            'user' => $user
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
        $user = User::find($id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' =>$request->name,
            'birthday' =>$request->birthday,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'role' =>$request->role,
            'is_active' =>$request->is_active,
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // Comment::where('user_id', $id)->delete();
        
        // $posts = Post::where('user_id', $id)->get();
        
        // foreach ($posts as $post) {
        //     Comment::where('post_id', $post->id)->delete();
        //     $post->delete();
        // }

        // $categories = Category::where('user_id', $id)->get();

        // foreach ($categories as $category) {
        //     $posts = Post::where('category_id', $category->id)->get();

        //     foreach ($posts as $post) {
        //         Comment::where('post_id', $post->id)->delete();
        //         $post->delete();
        //     }

        //     $category->delete();
        // }

        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
