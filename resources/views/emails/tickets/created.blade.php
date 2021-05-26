<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    Dear {{ $contact->name }}, 
    <div class="pt-3">
        I would like to acknowledge you that I have created a ticket on your behalf with the Ticket ID - {{ $ticket->id }}.<br>
        Your ticket will be reviewed shortly and you will receive a personal response (usually within 24 hours).
    </div>
    <div>
        Ticket details <br>
        Title: {{ $ticket->name }}<br>
        Comment: {{ $ticket->text }}
    </div>
    Kind regards,<br>
    {{ $user->name }}
 
</body>






