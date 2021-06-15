@extends('layout.theme')

<!-- {{ asset("css/style.css") }} -->
@section('content')


<!-- header -->
<div class="page-heading header-text"></div>

<div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Onze <em>Menu's</em></h2>
            <span>Maak kennis met onze menu's, gemaakt met verse producten en aan huis geleverd.</span>
          </div>
        </div>

        <!-- menu's weergeven -->
        @foreach ($dishes as $dish)
        <div class="col-md-4">
          <div class="service-item">
            <img src="/storage/{{$dish->image}}" alt="">
            <div class="down-content">
              <h4>{{$dish->name}}</h4>
              <div style="margin-bottom:10px;">
                <span> <sup>€</sup>{{$dish->price}}<sup></span>
              </div>
              <p>{{$dish->description}}</p>
              <a  class="filled-button"  href="/cart">Bestel</a>
            </div>
          </div> 
          <br>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection