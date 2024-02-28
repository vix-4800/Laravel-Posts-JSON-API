<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\Relationships;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

JsonApiRoute::server('v1')->prefix('v1')->resources(function (ResourceRegistrar $server) {
    $server->resource('posts', JsonApiController::class)
        ->relationships(
            function (Relationships $relations) {
                $relations->hasOne('author')->readOnly();
                $relations->hasMany('comments')->readOnly();
                $relations->hasMany('tags');
                $relations->hasMany('categories');
            }
        );

    $server->resource('categories', JsonApiController::class)
        ->relationships(
            function (Relationships $relations) {
                $relations->hasMany('posts')->readOnly();
            }
        );

    $server->resource('tags', JsonApiController::class)
        ->relationships(
            function (Relationships $relations) {
                $relations->hasMany('posts')->readOnly();
            }
        );

    $server->resource('comments', JsonApiController::class)
        ->relationships(
            function (Relationships $relations) {
                $relations->hasOne('user')->readOnly();
                $relations->hasOne('post');
            }
        );

    $server->resource('users', JsonApiController::class)
        ->relationships(
            function (Relationships $relations) {
                $relations->hasOne('posts');
                $relations->hasOne('comments');
            }
        );
});
