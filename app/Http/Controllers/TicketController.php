<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {
        $tickets = Auth::user()->tickets;
        $contacts = Auth::user()->contacts;
        $types = Type::all();
        return view('tickets.index', compact('tickets', 'contacts', 'types'));    
        
    }
    
    public function create($id)
    {
        $types = Type::all();
        return view('tickets.create', compact('id', 'types'));
    }


    public function store(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
            
        $user_id = Auth::id();
        $ticket = new Ticket();
        $ticket->name = request('name');
        $ticket->text = request('text');
        $ticket->type_id = request('type_id');
        $ticket->user_id = $user_id;
        $ticket->contact_id = $id;
        $ticket->save();

        return redirect('/dashboard/contacts')->with('success', 'Ticket successfully added');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }


    public function update($id)
    {
        error_log($id);
    
        $user_id = Auth::id();
        $ticket = Ticket::findOrFail($id);
        $ticket->name = request('name');
        $ticket->text = request('text');
        $ticket->user_id = $user_id;
        $ticket->status = request('status');
        $ticket->save();

        return redirect('/dashboard/tickets')->with('completed', 'Ticket has been updated');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/dashboard/tickets')->with('completed', 'Ticket has been deleted');
    }

}
