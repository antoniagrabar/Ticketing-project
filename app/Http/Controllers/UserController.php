<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function statistics(){
        $contactCount = Auth::user()->contacts->count(); 
        $tickets = Auth::user()->tickets;
        $ticketCount = Auth::user()->tickets->count();
        $completedTickets = $tickets->where('status','=','1')->count();
        $pendingTickets = $tickets->where('status','=','0')->count();
        return view('dashboard', compact('contactCount', 'completedTickets', 'pendingTickets', 'ticketCount'));
    }

}
