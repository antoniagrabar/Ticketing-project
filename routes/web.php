<?php

namespace App\Http\Controllers;
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
Route::get('/', function () {
    return view('welcome');
}); 

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [ContactsController::class, 'index']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/dashboard', [ContactsController::class, 'index']);
    Route::post('/dashboard', [ContactsController::class, 'store'])->name('store');
    Route::get('/dashboard/create', [ContactsController::class, 'create'])->name('create');
    Route::get('/dashboard/{contact}', [ContactsController::class, 'show']);
    Route::get('/dashboard/{contact}/edit', [ContactsController::class, 'edit'])->name('edit');
    Route::post('/dashboard/{contact}', [ContactsController::class, 'update'])->name('update');
    Route::delete('/dashboard/{contact}', [ContactsController::class, 'destroy'])->name('destroy');
}); 




require __DIR__.'/auth.php';
