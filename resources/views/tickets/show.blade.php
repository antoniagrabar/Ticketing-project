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
@endsection