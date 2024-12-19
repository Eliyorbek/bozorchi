<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        // Token muddati tugagan bo'lsa
        if ($exception instanceof TokenExpiredException) {
            return response()->json([
                'message' => 'Token expired.'
            ], 401);
        }

        // Token yaroqsiz bo'lsa
        if ($exception instanceof TokenInvalidException) {
            return response()->json([
                'message' => 'Token is invalid.'
            ], 401);
        }

        // Token bo'lmasa yoki JWT bilan bog'liq boshqa xatoliklar bo'lsa
        if ($exception instanceof JWTException) {
            return response()->json([
                'message' => 'Token not provided or invalid.'
            ], 401);
        }

        // Boshqa xatoliklar uchun standart render funksiyasi
        return parent::render($request, $exception);
    }
}
