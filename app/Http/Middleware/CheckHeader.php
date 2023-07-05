<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->header('id')) {
            return response()->json([
                'status' => 403,
                'message' => __('message.403'),
                'data' => [],
            ], 403);
        }

        $user = User::find($request->header('id'));
        if (!$user) {
            return response()->json([
                'status' => 403,
                'message' => __('message.403'),
                'data' => [],
            ], 403);
        }
        auth()->loginUsingId($user->id);
        return $next($request);
    }
}
