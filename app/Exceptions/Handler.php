<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use LaravelJsonApi\Core\Exceptions\JsonApiException;
use LaravelJsonApi\Exceptions\ExceptionParser;
use LaravelJsonApi\Laravel\Exceptions\HttpNotAcceptableException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        JsonApiException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(
            ExceptionParser::make()->renderable()
        );
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof HttpNotAcceptableException) {
            return response()->json([
                "jsonapi" => [
                    "version" => "1.0"
                ],
                "errors" => [
                    [
                        "detail" => "The requested resource is only capable of generating 'application/vnd.api+json' content. Wrong Accept header",
                        "status" => "406",
                        "title" => "Not Acceptable",
                    ]
                ]
            ])->setStatusCode(406);
        }

        return parent::render($request, $e);
    }
}
