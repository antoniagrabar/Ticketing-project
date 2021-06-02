</style>
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
            <a href="{{ route('showTicket', $ticket->id) }}" class="underline"><i class="fa fa-long-arrow-left pr-2"></i>Go back</a>
          </div>
          <div class="card">
            <div class="card-header">
              Edit & Update
            </div>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div><br />
              @endif
              <form action="{{ route('updateTicket', $ticket->id) }}" method="POST">
                <div class="form-group">
                  <label for="name">Title</label>
                  <input type="textbox" class="form-control" name="name" value="{{ $ticket->name }}" />
                  <label for="address">Comment</label>
                  <input type="textbox" class="form-control" name="text" value="{{ $ticket->text }}" />
                </div>
                <div class="form-group">
                  @csrf
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option selected={{ $ticket->status }} value="0">pending</option>
                    <option selected={{ $ticket->status }} value="1">completed</option>
                  </select>
                </div>
                <div class="d-flex justify-content-center align-items-center pt-2">
                  <x-button type="submit" style="background: #6172d3">Update Ticket</x-button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

</html>