<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card-deck text-white">
                        <div class="card m-5" style="border-radius: 0.4 rem">
                            <div class="card-body" style="background-color: #6475daa4 ">
                                <div style="font-size: 1.5rem;">{{ $ticketCount }}</div>
                                <div>Ticket Volume</div>
                            </div>
                        </div>
                        <div class="card m-5" >
                            <div class="card-body" style="background-color: #6474d4">
                              <div style="font-size: 1.5rem;">{{$pendingTickets}}</div>
                              <div>Pending Tickets</div>
                            </div>
                        </div>
                        <div class="card m-5">
                            <div class="card-body" style="background-color: #4c59a1">
                               <div style="font-size: 1.5rem;">{{$completedTickets}}</div>
                               <div>Completed Tickets</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>