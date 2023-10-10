<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'abilities:check-status'])->group(function(){
    Route::resource('users', UsersController::class, ['except' => ['create', 'edit']]);
    Route::resource('notes', NotesController::class, ['except' => ['create', 'edit']]);
    // Route::post('logout', [AuthController::class, 'logout']);
    // Route::get('dashboard', DashboardController::class);
});