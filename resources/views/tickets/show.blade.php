<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tickets</title>
  <script src="https://use.fontawesome.com/ba8d0895b7.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
</head>

<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div style="color:black" class="pb-5">
            <a href="{{ route('indexTicket') }}" class="underline"><i class="fa fa-long-arrow-left pr-2"></i>Go back</a>
          </div>
          <div class="card">
            <div class="card-header text-uppercase d-flex justify-content-between align-items-start">
              <b>{{ $ticket->name }}</b>
              <div>
                <a href="{{ route('editTicket', $ticket->id)}}">
                  <i class="fa fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('destroyTicket', $ticket->id) }}" method="post" style="display: inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                    <i class="fa fa-trash fa-lg delete-hover pl-2 pr-2"></i>
                  </button>
                </form>
              </div>
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
              <hr class="pt-2 pb-2">
              <div>
                TYPE: {{ $type->name }} <br>
                STATUS: {{ $status}} <br>
                CONTACT NAME: {{ $contact->name }} <br>
                CONTACT EMAIL: {{ $contact->email_address }}
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>

</html>