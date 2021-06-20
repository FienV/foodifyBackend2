@extends('layout.theme')
@section('content')

<!--header --> 

<div class="page-heading header-text">
</div>
<div class="col-md-12">
  <div class="section-heading mt-5">
    <h2>Tis bijna... <em>smultijd :)</em></h2>
  </div>
</div>


<!--cart-->

<div class="container">
 
    <div class="row">
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="thead-primary">
              <tr>
                <th><h3>Gerecht</h3></th>
                <th><h3>Prijs</h3></th>
              
                
              </tr>
              
            </thead>
            
            <tbody>
              <div class="col-md-8">

              @php $totalprice = 0; @endphp
              @foreach ($orders as $order)
              <tr class="alert" role="alert">
                <td>
                  <div class="email">
                    <span><b>{{$order->name}}</b></span> <br>
                    <span>{{$order->description}}</span>
                  </div>
                </td>
                <td>€ {{$order->price}}</td>
        
              </tr>
              @php $totalprice = $totalprice + $order->price; @endphp
              @endforeach
                    
            </div>
            </tbody>
          </table>
           <h2 class='ml-2'>Totaalprijs: € {{$totalprice}}</h2>
          
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      <form method="post" action="/signup" enctype="multipart/form-data">
      
      {{-- Alle data verzamelen die we gaan meeposten naar onze store DB methode; de gerechten halen we uit de sessions--}}

        <input type="hidden" name="totaal" value="{{$totalprice}}">

        <div class="form-group">
          <label for="exampleInputEmail1">Naam</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">Uw volledige naam aub!</small>
        </div>
      
        <div class="form-group">
          <label for="exampleInputEmail1">Uw email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We delen dit uiteraard met niemand...</small>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Betalen met</label>
          <select class="form-control" name="payment" id="exampleFormControlSelect2">
            <option>Maak uw keuze...</option>
            <option>KBC</option>
            <option>BELFIUS</option>
            <option>PAYPAL</option>
            <option>MASTERCARD</option>
           
          </select>
        </div>
  
      </form>
    <!--order button -->   
    <a href="/payment" class="buy-btn mt-4 mb-4">Bestellen</a>
</div>

@endsection
