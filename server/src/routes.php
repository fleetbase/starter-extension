<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** @var string $prefix */
$prefix = config('starter.api.routing.prefix', 'starter');
/** @var string $internalPrefix */
$internalPrefix = config('starter.api.routing.internal_prefix', 'int');

Route::prefix($prefix)->namespace('Fleetbase\Starter\Http\Controllers')->group(
    function (Router $router) use ($internalPrefix) {
        /*
        |--------------------------------------------------------------------------
        | Starter API Routes
        |--------------------------------------------------------------------------
        |
        | Primary internal routes for console.
        */
        $router->prefix($internalPrefix)->group(
            function (Router $router) {
                $router->group(
                    ['prefix' => 'v1', 'middleware' => ['fleetbase.protected']],
                    function (Router $router) {
                        // $router->fleetbaseRoutes('resource');
                    }
                );
            }
        );
    }
);
