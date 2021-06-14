@extends('layout.theme')
@section('content')
<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
      <!-- Item -->
      <div class="item item-1">
        <div class="img-fill">
            <div class="text-content">
              <h6>opzoek naar een nieuw lekker plaatsje?</h6>
              <h4> Ontdek hier de lekkerste hotspots! </h4>
              <p> </p>
              <a href="/restaurant" class="filled-button">Restaurants</a>
            </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
            <div class="text-content">
              <h6>Specifieke vraag? </h6>
              <h4>Heb jij een specifieke vraag? <br>
              Wil jij jouw restaurant op onze site?  </h4>
              <p>vul het formulier in en wij nemen asap contact met je op!</p>
              <a href="/contact" class="filled-button">contact</a>
            </div>
        </div>
      </div>
      <!-- // Item -->     
    </div>
</div>
@endsection