<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPostOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $postId = $request->route('id');
        $userId = Post::find($postId)->user_id;
        if (Auth::id() === $userId) {
            return $next($request);
        }
        return abort(403);
    }
}
