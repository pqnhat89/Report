<?php

namespace App\Exceptions;

use Exception;
use App\Helpers\SessionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            Auth::guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            SessionHelper::resetCookie();
            return redirect('/login')->withErrors('Phiên đăng nhập của bạn đã hết. Vui lòng đăng nhập lại !');
        }

        return parent::render($request, $exception);
    }
}
