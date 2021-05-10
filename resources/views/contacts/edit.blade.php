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
      <form action="{{ route('update', $contact->id) }}"  method="POST">
      <div class="form-group">
            @csrf
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $contact->name }}"/>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $contact->address }}"/>
          </div>
          <div class="form-group">
            <label for="email_address">Email address</label>
            <input type="email" class="form-control" name="email_address" value="{{ $contact->email_address }}"/>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input type="tel" class="form-control" name="phone_number" value="{{ $contact->phone_number }}"/>
          </div>
          <button type="submit" class="btn btn-block button-edit">Update User</button>
      </form>
  </div>
</div>
@endsection