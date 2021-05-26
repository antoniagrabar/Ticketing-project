<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container  text-white">
                        @if(session()->get('alert'))
                        <div class=" alert alert-success">
                            {{ session()->get('alert') }}
                        </div>
                        @endif
                        <div class="row pt-5 d-flex justify-content-between align-items-end px-3">
                            <a href="{{ route('create')}}" class="btn button-add btn-sm"">Add contact</a>
                            <form 
                                style="height:38px"
                                action=" {{ route('search') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search contact" required />
                            </form>    
                        </div>
                        <div class="container bg-white rounded shadow mt-2">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr class="header">
                                            <td width=5%">#</td>
                                            <td width="15%">Name</td>
                                            <td width="25%">Address</td>
                                            <td width="20%">Email address</td>
                                            <td width="15%">Phone number</td>
                                            <td width="20%" class="text-center">Action</td>
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
                                                <form action="{{ route('destroy', $contact->id)}}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn button-delete btn-sm"" type=" submit">Delete</button>
                                                </form>
                                                <a href="{{ route('createTicket', $contact->id)}}" class="btn button-add btn-sm"">Add ticket</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>