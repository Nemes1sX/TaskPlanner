<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $task = request('task');

        if (auth()->id() != $task->user_id) {
            abort(403);
        }

        return $next($request);
    }
}
