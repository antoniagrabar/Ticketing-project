<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
</head>

<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  
                  
                  <div class="card">
                    <div class="card-header">
    {{ $ticket->name }}
  </div>
  
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="pb-5">
        {{ $ticket->text }}
      </div>
      <div>
        <a href="{{ route('editTicket', $ticket->id)}}" class="btn button-edit btn-sm"">Edit</a>
        <form action="{{ route('destroyTicket', $ticket->id)}}" method="post" style="display: inline-block">
          @csrf
            @method('DELETE')
            <button class="right btn button-delete btn-sm" type="submit">Delete</button>
          </form>
        </div>
        
      </div>
    </div>
  
  </div>
  </div>
  </div>
  </div>
  </x-app-layout>

</html>