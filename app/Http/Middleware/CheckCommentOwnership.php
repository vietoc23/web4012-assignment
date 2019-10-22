<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCommentOwnership
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
        $commentId = $request->route('id');
        $userId = Comment::find($commentId)->user_id;
        if (Auth::id() === $userId) {
            return $next($request);
        }
        return abort(403);
    }
}
