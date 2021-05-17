<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tickets</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/tickets.css') }}">
    </head>
    
    <body>
    <div class="grid">
        @foreach($tickets as $ticket)
        <div class="grid-item">
          <div class="card">
          <div class="card-content">
            <h1 class="card-header">
                @foreach($types as $type)
                <?php
                   if($type->id == $ticket->type_id){
                       echo strtoupper($type->name);
                   }
                ?>
                @endforeach
            </h1>
            <p class="card-text">
                <h1>{{ $ticket->name }}</h1>
                @foreach($contacts as $contact)
                <?php
                   if($contact->id == $ticket->contact_id){
                       echo "By $contact->name";
                   }
                ?>
                @endforeach
                <h4 class="pt-5">
                    <?php
                    if($ticket->status == 0){
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
    </body>

</html>