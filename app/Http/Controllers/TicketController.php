<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Models\Type;
use App\Models\Contact;
use App\Providers\RouteServiceProvider;
use App\Events\CreatedTicket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->paginate(9);
        $contacts = Auth::user()->contacts;
        $types = Type::all();
        return view('tickets.index', compact('tickets', 'contacts', 'types'));
    }

    public function indexCompleted()
    {
        $completedTickets = Ticket::where('user_id', Auth::id())->where('status', '=', '1')->paginate(9);
        $contacts = Auth::user()->contacts;
        $types = Type::all();
        return view('tickets.completed', compact('completedTickets', 'contacts', 'types'));
    }

    public function indexPending()
    {
        $pendingTickets = Ticket::where('user_id', Auth::id())->where('status', '=', '0')->paginate(9);
        $contacts = Auth::user()->contacts;
        $types = Type::all();
        return view('tickets.pending', compact('pendingTickets', 'contacts', 'types'));
    }

    public function search(Request $request, $status)
    {
        $search = $request->input('search') ?: "";
        $tickets = Ticket::query()
            ->where('user_id', Auth::id())
            ->where(function (Builder $builder) use ($search) {
                $builder->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('text', 'LIKE', "%{$search}%");
            })
            ->paginate(9);

        $contacts = Auth::user()->contacts;
        $types = Type::all();

        return view('tickets.search', compact('tickets', 'contacts', 'types'));
    }

    public function searchCompleted(Request $request)
    {
        $search = $request->input('search') ?: "";
        $tickets = Ticket::query()
            ->where('user_id', Auth::id())
            ->where('status', '=', '1')
            ->where(function (Builder $builder) use ($search) {
                $builder->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('text', 'LIKE', "%{$search}%");
            })
            ->paginate(9);

        $contacts = Auth::user()->contacts;
        $types = Type::all();

        return view('tickets.search', compact('tickets', 'contacts', 'types'));
    }

    public function searchPending(Request $request)
    {
        $search = $request->input('search') ?: "";
        $tickets = Ticket::query()
            ->where('user_id', Auth::id())
            ->where('status', '=', '0')
            ->where(function (Builder $builder) use ($search) {
                $builder->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('text', 'LIKE', "%{$search}%");
            })
            ->paginate(9);

        $contacts = Auth::user()->contacts;
        $types = Type::all();

        return view('tickets.search', compact('tickets', 'contacts', 'types'));
    }

    public function create($id)
    {
        $types = Type::all();
        return view('tickets.create', compact('id', 'types'));
    }


    public function store(StoreTicketRequest $request, $id)
    {
        $data = array_merge($request->validated(), ['user_id'=>Auth::id(), 'contact_id'=>$id]);
        $contacts = Ticket::query()->create($data);

        return redirect('/contacts')->with('alert', 'Ticket successfully added');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        $type = Type::findOrFail($ticket->type_id);
        $contact = Contact::findOrFail($ticket->contact_id);
        if($type->id == '0'){
            $status = 'pending';
        } else {
            $status = 'completed';
        }
        return view('tickets.show', compact('ticket', 'type', 'contact', 'status'));
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

        return redirect('/tickets/all')->with('alert', 'Ticket has been updated');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/tickets/all')->with('alert', 'Ticket has been deleted');
    }
}
