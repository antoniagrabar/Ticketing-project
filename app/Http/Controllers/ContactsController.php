<?php


namespace App\Http\Controllers;
use App\Models\Contact;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ContactsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        
        $contacts = Auth::user()->contacts;
        return view('contacts.index', compact('contacts'));    
    }

    public function create()
    {
        return view('contacts.create');
    }


    public function store()
    {
        $contact = new Contact();
        $contact->name = request('name');
        $contact->address = request('address');
        $contact->email_address = request('email_address');
        $contact->phone_number = request('phone_number');
        $contact->user_id = Auth::id();
        $contact->save();
    
        return redirect('/dashboard')->with('completed', 'Contact has been saved!');
    }

    public function show()
    {
    }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->user_id !== Auth::id()) {
            return redirect()->to('/dashboard');;
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

        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/dashboard')->with('completed', 'Contact has been deleted');
    }




}
