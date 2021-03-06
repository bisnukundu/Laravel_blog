<?php

use App\Http\Controllers\Category;
use App\Http\Controllers\Post;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get( '/', function () {
    return "Bisnu kundu";
} );

Route::middleware( ['auth:sanctum', 'verified'] )->group( function () {
    Route::get( "/dashboard", function () {
        return view( 'dashboard' );
    } );
    Route::resources( [
        'post'     => Post::class,
        'category' => Category::class,
        'team'     => TeamController::class,
    ] );
} );
