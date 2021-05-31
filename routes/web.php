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
    Route::get('/dashboard', [UserController::class, 'statistics'])->name('home');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/dashboard/contacts', [ContactsController::class, 'store'])->name('store');
    Route::get('/dashboard/contacts', [ContactsController::class, 'index'])->name('index');
    Route::get('/dashboard/contacts/create', [ContactsController::class, 'create'])->name('create');
    Route::get('/dashboard/contacts/search', [ContactsController::class, 'search'])->name('search');
    Route::post('/dashboard/contacts/{contact}', [ContactsController::class, 'update'])->name('update');
    Route::get('/dashboard/contacts/{contact}', [ContactsController::class, 'show']);
    Route::delete('/dashboard/contacts/{contact}', [ContactsController::class, 'destroy'])->name('destroy');
    Route::get('/dashboard/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('edit');
    Route::get('/dashboard/tickets/all', [TicketController::class, 'index'])->name('indexTicket');
    Route::get('/dashboard/tickets/pending', [TicketController::class, 'indexPending'])->name('indexPending');
    Route::get('/dashboard/tickets/completed', [TicketController::class, 'indexCompleted'])->name('indexCompleted');
    Route::get('/dashboard/tickets/all/search', [TicketController::class, 'search'])->name('searchTicket');
    Route::get('/dashboard/tickets/completed/search', [TicketController::class, 'searchCompleted'])->name('searchCompletedTicket');
    Route::get('/dashboard/tickets/pending/search', [TicketController::class, 'searchPending'])->name('searchPendingTicket');
    Route::post('/dashboard/contacts/{contact}', [TicketController::class, 'store'])->name('storeTicket');
    Route::get('/dashboard/contacts/{contact}/create', [TicketController::class, 'create'])->name('createTicket');
    Route::get('/dashboard/tickets/{ticket}', [TicketController::class, 'show'])->name('showTicket');
    Route::post('/dashboard/tickets/{ticket}', [TicketController::class, 'update'])->name('updateTicket');
    Route::get('/dashboard/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('editTicket');
    Route::delete('/dashboard/tickets/{ticket}', [TicketController::class, 'destroy'])->name('destroyTicket');
}); 

require __DIR__.'/auth.php';
