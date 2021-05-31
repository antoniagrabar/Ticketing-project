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
                    <div class="pb-3">
                        Currently you have {{$contactCount}} contacts saved.
                    </div>
                    <div>
                        Tickets({{ $ticketCount }})
                        <ul class="ml-4">
                            <li>Pending tickets: {{$pendingTickets}}</li>
                            <li>Completed tickets: {{$completedTickets}}</li>
                        </ul>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>