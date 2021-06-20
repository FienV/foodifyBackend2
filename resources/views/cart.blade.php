@extends('layout.theme')
@section('content')

<!--header --> 

<div class="page-heading header-text">
</div>
<div class="col-md-12">
  <div class="section-heading mt-5">
    <h2>Ons <em>winkelmandje</em></h2>
  </div>
</div>


<!--cart-->

<div class="container">
  <form method="post" action="/cart" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="thead-primary">
              <tr>
                <th><h3>Gerecht</h3></th>
                <th><h3>Prijs</h3></th>
                <th><h3>Hoeveelheid<h3></th>
                  <th></th>
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
                <td>
                  <a href='/removecart/{{$order->id}}'>
                    <span aria-hidden="true"><i class="fa fa-close" style="color: #dc3545;
                      font-size: 20px;"></i></span>
                  </a>
                </td>
              </tr>
              @php $totalprice = $totalprice + $order->price;
               @endphp
              @endforeach
                    
            </div>
            </tbody>
          </table>
           <h2 class='ml-2'>Totaalprijs: € {{$totalprice}}</h2>
           @php 
           session()->push('totalprice', $totalprice);
           //session()->flush();
           //print_r(session('totalprice'));
           @endphp
          
        </div>
      </div>
    </div>
    <br>
  </form>
    <!--order button -->   
    <a href="/affirmation"><button type="submit" class="buy-btn">Bestel</button></a>
</div>

@endsection
