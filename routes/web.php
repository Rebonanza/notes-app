<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth')->group(function() {
    // Route::resource('users', UsersController::class);
    Route::get('/dashboard', [NotesController::class, 'index']);
    Route::resource('/notes', NotesController::class);
    Route::get('/notes/create', [NotesController::class, 'create']);
    Route::post('/notes/create', [NotesController::class, 'store']);

    Route::get('/notes/edit{id}', [NotesController::class, 'edit']);
    Route::put('/notes/edit/{id}', [NotesController::class, 'update']);

    Route::delete('/notes/delete/{id}', [NotesController::class, 'destroy']);

    Route::get('/edit', function(){
        return view('notes.edit');
    });
    Route::post('/logout', [AuthController::class, 'logout']);
 });
Route::get('/register', function(){
    return view('auth.register');
});
Route::post('/', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', function(){
    return view('auth.login');
})->name('login');

// Route::get('/', function(){
//     \
// });