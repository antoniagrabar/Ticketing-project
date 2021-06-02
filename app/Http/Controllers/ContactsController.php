<?php


namespace App\Http\Controllers;
use App\Models\Contact;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->paginate(10);
        return view('contacts.index', compact('contacts'));  
    }

  
    public function search(Request $request){
        $search = $request->input('search') ?: "";
        $contacts = Contact::query()
        ->where('user_id', Auth::id())
        ->where(function(Builder $builder) use ($search){
            $builder->where('name', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->orWhere('email_address', 'LIKE', "%{$search}%");
        })
        ->orderBy('id')
        ->paginate(10);

        return view('contacts.search', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function statistics()
    {
        $contacts = Auth::user()->contacts->count(); 
        return view('dashboard', compact('contactCount'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email_address' => 'required',
            'phone_number' => 'required|numeric',
        ]);

        $contact = new Contact();
        $contact->name = request('name');
        $contact->address = request('address');
        $contact->email_address = request('email_address');
        $contact->phone_number = request('phone_number');
        $contact->user_id = Auth::id();
        $contact->save();
    
        return redirect('/dashboard/contacts')->with('alert', 'Contact successfully added');
    }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->user_id !== Auth::id()) {
            return redirect()->to('/dashboard/contacts');;
        }
        return view('contacts.edit', compact('contact'));
    }


    public function update($id)
    {
        error_log($id);
    
        $user_id = Auth::id();
        $contact = Auth::user()->contacts->first();
        $contact->name = request('name');
        $contact->address = request('address');
        $contact->email_address = request('email_address');
        $contact->phone_number = request('phone_number');
        $contact->user_id = $user_id;
        $contact->save();

        return redirect('/dashboard/contacts')->with('alert', 'Contact has been updated'); 
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/dashboard/contacts')->with('alert', 'Contact has been deleted');
    }

}
