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
Route::get('/dashboard', function () {
    return view('dashboard');
}); 

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/dashboard', [ContactsController::class, 'home'])->name('home');
    Route::post('/dashboard/contacts', [ContactsController::class, 'store'])->name('store');
    Route::get('/dashboard/contacts', [ContactsController::class, 'index'])->name('index');
    Route::get('/dashboard/contacts/create', [ContactsController::class, 'create'])->name('create');
    Route::get('/dashboard/contacts/{contact}', [ContactsController::class, 'show']);
    Route::get('/dashboard/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('edit');
    Route::post('/dashboard/contacts/{contact}', [ContactsController::class, 'update'])->name('update');
    Route::delete('/dashboard/contacts/{contact}', [ContactsController::class, 'destroy'])->name('destroy');
    Route::get('/dashboard/tickets', [TicketController::class, 'index'])->name('indexTicket');
    Route::post('/dashboard/contacts/{contact}', [TicketController::class, 'store'])->name('storeTicket');
    Route::get('/dashboard/contacts/{contact}/create', [TicketController::class, 'create'])->name('createTicket');
    Route::get('/dashboard/tickets/{ticket}', [TicketController::class, 'show'])->name('showTicket');
    Route::get('/dashboard/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('editTicket');
    Route::post('/dashboard/tickets/{ticket}', [TicketController::class, 'update'])->name('updateTicket');
    Route::delete('/dashboard/tickets/{ticket}', [TicketController::class, 'destroy'])->name('destroyTicket');
}); 

require __DIR__.'/auth.php';
