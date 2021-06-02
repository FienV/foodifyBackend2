@extends('layout.theme')
@section('content')

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Registreer u hier</h2>
        </div>
      </div>
    </div>
  </div>

<div class="col md-8">
    <form method="post" action="/signup" enctype="multipart/form-data">
     @csrf
        <div class="form-group mt-3">
            <label for="">Volledige naam</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group mt-3">
            <label for="">Wachtwoord</label>
            <input type="text" class="form-control" name="password" value="{{ old('password') }}">
        </div>

        <div class="form-group mt-3">
            <label for="">Adres</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
        </div>

        <div class="form-group mt-3">
            <label for="exampleFormControlSelect1">Postcode en gemeente</label>
            <select class="form-control" name="city_id">
            @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->name}} - {{$city->zipcode}}</option>
            @endforeach
            </select>
        </div> 
        <div class="form-group mt-3">
            <label for="">Telefoon</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
</div>
@endsection