@extends('layout.theme')
@section('content')

<!-- header -->
<div class="page-heading header-text"></div>

<div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Onze <em>Restaurants</em></h2>
          </div>
        </div>

        <!-- menu's weergeven -->
        @foreach ($restaurants as $restaurant)
        <div class="col-md-4">
          <div class="service-item">
            <div class="down-content">
              <h4>{{$restaurant->resto_name}}</h4>
              <div style="margin-bottom:10px;">
                <p>Adres: {{$restaurant->address}} - {{$restaurant->city->zipcode}} {{$restaurant->city->name}}</p>
              </div>
              <div style="margin-bottom:10px;">
                <p>{{$restaurant->description}}</p>
              </div>
              <a href="/menu/{{$restaurant->id}}" class="filled-button mt-3">Bekijk onze menu</a>
            </div>
          </div> 
          <br>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection