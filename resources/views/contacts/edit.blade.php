<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacts</title>
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
            <a href="{{ route('indexContact')}}" class="underline"><i class="fa fa-long-arrow-left pr-2"></i>Go back</a>
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
              <form action="{{ route('updateContact', $contact->id) }}" method="POST">
                <div class="form-group">
                  @csrf
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $contact->name }}" />
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" value="{{ $contact->address }}" />
                </div>
                <div class="form-group">
                  <label for="email_address">Email address</label>
                  <input type="email" class="form-control" name="email_address" value="{{ $contact->email_address }}" />
                </div>
                <div class="form-group">
                  <label for="phone_number">Phone number</label>
                  <input type="tel" class="form-control" name="phone_number" value="{{ $contact->phone_number }}" />
                </div>
                <div class="d-flex justify-content-center align-items-center pt-2">
                <x-button type="submit" style="background: #5062cc">Update Contact</x-button>
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