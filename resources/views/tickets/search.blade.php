<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tickets</title>
    <script src="https://use.fontawesome.com/ba8d0895b7.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tickets.css') }}">
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-5 d-flex justify-content-between align-items-start px-3">
                        <div class="mb-5">
                            <a href="{{ route('indexTicket') }}" class="underline">All</a> /
                            <a href="{{ route('indexPending') }}" class="underline">Pending</a> /
                            <a href="{{ route('indexCompleted') }}" class="underline">Completed</a>
                        </div>
                        <form action=" {{ route('searchTicket') }}" method="GET">
                            <div class="form-group input-group align-items-end">
                                <input class="form-control" type="search" style="border-radius: 4px; height: 30.8px;" name="search" placeholder="Search ticket" required />
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent" style="border: none"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if(session()->get('alert'))
                    <div class=" alert alert-success">
                        {{ session()->get('alert') }}
                    </div>
                    @endif

                    @if($tickets->isNotEmpty())
                    <div class="row">
                        @foreach($tickets as $ticket)
                        <div class="col-6 col-md-4">
                            <div class="card grid-item">
                                <div class="card-content">
                                    <h1 class="card-header">
                                        @foreach($types as $type)
                                        <?php
                                        if ($type->id == $ticket->type_id) {
                                            echo strtoupper($type->name);
                                        }
                                        ?>
                                        @endforeach
                                    </h1>
                                    <p class="card-text">
                                    <h1 class="card-title">{{ $ticket->name }}</h1>
                                    @foreach($contacts as $contact)
                                    <?php
                                    if ($contact->id == $ticket->contact_id) {
                                        echo "By $contact->name";
                                    }
                                    ?>
                                    @endforeach
                                    <h4 class="pt-5">
                                        <?php
                                        if ($ticket->status == 0) {
                                            echo "Pending";
                                        } else {
                                            echo "Completed";
                                        }
                                        ?>
                                    </h4>
                                    </p>

                                    <a href="{{ route('showTicket', $ticket->id) }}">
                                        <x-button class="btn-block d-flex align-items-center justify-content-center">
                                            View
                                        </x-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class=" d-flex justify-content-center pt-2">
                        {{isset($search)? $tickets->appends(['search'=> $search])->links() : $tickets->links()}}
                    </div>
                    @else
                    <div class="text-black mt-3">
                        The search did not match any tickets.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>