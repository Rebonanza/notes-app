<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotesController;
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

// Route::middleware('auth')->group(function() {
    Route::resource('users', UsersController::class);
    Route::resource('/', NotesController::class);
    Route::get('/notes/create', function(){
        return view('notes.create');
    });
    Route::get('/edit', function(){
        return view('notes.edit');
    });
    Route::post('/logout', [AuthController::class, 'logout']);
// });
Route::get('/register', function(){
    return view('auth.register');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', function(){
    return view('auth.login');
});

// Route::get('/', function(){
//     \
// });