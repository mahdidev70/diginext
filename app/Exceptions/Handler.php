<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // return $exception;
        // return response(['error' => $exception->getMessage()], $exception->getCode() ?: 400);
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                "status" => 404,
                "messages" => __('message.404')
            ], 404);
        }
        if ($exception instanceof AuthorizationException) {
            return response()->json([
                "status" => 403,
                "messages" => __('message.403')
            ], 403);
        }
        if ($exception instanceof AccessDeniedHttpException) {
            return response()->json([
                "status" => 403,
                "messages" =>  __('message.403')
            ], 403);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'code' => 401,
                'message' => __('message.401')
            ],  401);
        }



        return parent::render($request, $exception);
    }
}
