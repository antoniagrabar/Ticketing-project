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
    Route::post('contacts', [ContactsController::class, 'store'])->name('storeContact');
    Route::get('contacts', [ContactsController::class, 'index'])->name('indexContact');
    Route::get('/contacts/create', [ContactsController::class, 'create'])->name('createContact');
    Route::get('/contacts/search', [ContactsController::class, 'search'])->name('searchContact');
    Route::post('/contacts/{contact}', [ContactsController::class, 'update'])->name('updateContact');
    Route::get('/contacts/{contact}', [ContactsController::class, 'showContact']);
    Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy'])->name('destroyContact');
    Route::get('/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('editContact');
    Route::get('/tickets/all', [TicketController::class, 'index'])->name('indexTicket');
    Route::get('/tickets/pending', [TicketController::class, 'indexPending'])->name('indexPending');
    Route::get('/tickets/completed', [TicketController::class, 'indexCompleted'])->name('indexCompleted');
    Route::get('/tickets/all/search', [TicketController::class, 'search'])->name('searchTicket');
    Route::get('/tickets/completed/search', [TicketController::class, 'searchCompleted'])->name('searchCompletedTicket');
    Route::get('/tickets/pending/search', [TicketController::class, 'searchPending'])->name('searchPendingTicket');
    Route::post('/contacts/{contact}', [TicketController::class, 'store'])->name('storeTicket');
    Route::get('/contacts/{contact}/create', [TicketController::class, 'create'])->name('createTicket');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('showTicket');
    Route::post('/tickets/{ticket}', [TicketController::class, 'update'])->name('updateTicket');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('editTicket');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('destroyTicket');
}); 

require __DIR__.'/auth.php';
