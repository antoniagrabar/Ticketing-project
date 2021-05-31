<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    Dear {{ $contact->name }},
    <p>
        I would like to acknowledge you that I have created a ticket on your behalf with the Ticket ID - <b>{{ $ticket->id }}</b>.<br>
        Your ticket will be reviewed shortly and you will receive a personal response (usually within 24 hours).
    </p>
    <p>
        Ticket details <br>
        Title: {{ $ticket->name }}<br>
        Comment: {{ $ticket->text }}<br>
    </p>
    Kind regards,<br>
    {{ $user->name }}
 
</body>






