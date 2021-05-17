

@extends('layout')

@section('content')

<head>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('indexTicket') }}">Tickets</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</head>
    
<body>
    <div class="container  text-white">
        <div class="row pt-5">
            <div class="flex text-left justify-end mt-4 py-0">
                <a href="{{ route('create')}}" class="btn button-add btn-sm"">Add contact</a>
                <!-- @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div>
                @endif -->
            </div>
            <div class="text-black text-center col-sm-8 mx-auto">
                <h1 class="display-4 ">Contact list</h1>
            </div>
        </div>
    </div>
    <div class="container bg-white rounded shadow">
        <div class="row">
            
            <table class="table">
                <thead>
                    <tr class="header">
                    <td width=5%">#</td>
                    <td width="15%">Name</td>
                    <td width="25%">Address</td>
                    <td width="20%">Email address</td>
                    <td width="15%">Phone number</td>
                    <td  width="20%" class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->address}}</td>
                        <td>{{$contact->email_address}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td class="text-center">
                            <a href="{{ route('edit', $contact->id)}}" class="btn button-edit btn-sm">Edit</a>
                            <a href="{{ route('createTicket', $contact->id)}}" class="btn button-edit btn-sm"">Add ticket</a>
                            <form action="{{ route('destroy', $contact->id)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn button-delete btn-sm"" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection