<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tickets.css') }}">
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-5">
                        <a href="{{ route('indexTicket') }}" class="underline">All</a> /
                        <a href="{{ route('indexPending') }}" class="underline">Pending</a> /
                        <a href="{{ route('indexCompleted') }}" class="underline">Completed</a>
                    </div>
                    @if(session()->get('alert'))
                    <div class=" alert alert-success">
                        {{ session()->get('alert') }}
                    </div>
                    @endif

                    @if($pendingTickets->isNotEmpty())
                    <div class="row">
                        @foreach($pendingTickets as $ticket)
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

                                    <a href="{{ route('showTicket', $ticket->id) }}" class="card-btn"">View</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else 
                        <div class="text-black mt-5">
                            There are no pending tickets.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>