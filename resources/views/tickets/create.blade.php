@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    .blue{
    background-color: #99aab5;
  }
</style>



<div class="card push-top">
  <div class="card-header">
    New ticket
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
      <form action="{{ route('storeTicket', $id) }}" method="POST" >
          <div class="form-group">
            @csrf
            <select name="type_id" id="type_id" class="form-control">
                  @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="name"/>
            <label for="address">Comment</label>
            <input type="textbox" class="form-control" name="text"/>
          </div>
          <button type="submit" class="btn btn-block button-add">Submit</button>
      </form>
  </div>
</div>
@endsection