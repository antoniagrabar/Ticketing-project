<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacts</title>
    <script src="https://use.fontawesome.com/ba8d0895b7.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
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

                        <div class="row pt-5 d-flex justify-content-between align-items-start px-3">
                            <a href="{{ route('createContact') }}">
                                <x-button>
                                    <i class="fa fa-user-plus mr-2"></i>
                                    Add contact
                                </x-button>
                            </a>
                            <form action=" {{ route('searchContact') }}" method="GET">
                                <div class="form-group input-group align-items-end ">
                                    <input class="form-control" type="search" style="border-radius: 4px; height: 34px;" name="search" placeholder="Search contact" required />
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-transparent" style="border: none"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if($contacts->isNotEmpty())
                        <div class="container rounded shadow mt-2" style="background-color: #f7f7f7">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr class="header">
                                            <td width=6%">ID</td>
                                            <td width="17%">Name</td>
                                            <td width="35%">Address</td>
                                            <td width="15%">Email address</td>
                                            <td width="12%" >Phone number</td>
                                            <td width="15%" class="text-center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->id}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->address}}</td>
                                            <td>{{$contact->email_address}}</td>
                                            <td>{{$contact->phone_number}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('editContact', $contact->id)}}">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <form action="{{ route('destroyContact', $contact->id) }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <i class="fa fa-trash fa-lg delete-hover pl-2 pr-2"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('createTicket', $contact->id)}}""><i class=" fa fa-plus-square fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center pt-2">
                            {!! $contacts->links() !!}
                        </div>
                        @else
                        <div class="text-black mt-5">
                            You have no contacts saved.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>