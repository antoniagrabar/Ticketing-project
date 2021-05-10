

@extends('layout')

@section('content')

<body>
    <div class="flex text-right justify-end mt-4">
        <a  href="{{ route('logout') }}" class="underline text-md text-white">Log out</a>
    </div>
    <div class="container  text-white">
        <div class="row pt-5">
            <div class="flex text-left justify-end mt-4 py-0">
                <a href="{{ route('create')}}" class="btn button-add btn-sm"">Add contact</a>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div>
                @endif
            </div>
            <div class="text-center col-sm-8 mx-auto">
                <h1 class="display-4 ">Contact list</h1>
            </div>
        </div>
    </div>
    <div class="container bg-white rounded shadow">
        <div class="row">
            
            <table class="table-responsive">
                <thead>
                    <tr height="10%" class="header">
                    <td width=5%">#</td>
                    <td width="15%">Name</td>
                    <td width="30%">Address</td>
                    <td width="25%">Email address</td>
                    <td width="10%">Phone number</td>
                    <td  width="15%" class="text-center">Action</td>
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
                            <a href="{{ route('edit', $contact->id)}}" class="btn button-edit btn-sm"">Edit</a>
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