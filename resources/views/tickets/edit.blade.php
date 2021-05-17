@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
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
      <form action="{{ route('updateTicket', $ticket->id) }}"  method="POST">
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" name="name" value="{{ $ticket->name }}"/>
              <label for="address">Comment</label>
              <input type="textbox" class="form-control" name="text" value="{{ $ticket->text }}"/>
            </div>
            <div class="form-group">
              @csrf
              <select name="status" id="status" class="form-control">
                  <option selected={{ $ticket->status }} value="0">pending</option>
                  <option selected={{ $ticket->status }} value="1">completed</option>
              </select>
            </div>
          
          <button type="submit" class="btn btn-block button-edit">Update Ticket</button>
      </form>
  </div>
</div>
@endsection