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
  <form method="post" action="/signup" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="thead-primary">
              <tr>
                <th><h3>Gerecht</h3></th>
                <th><h3>Prijs</h3></th>
                <th><h3>Hoeveelheid<h3></th>
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
                <td class="quantity">
                  <div class="input-group">
                    @csrf
                    <input type="number" id="amount" name="amount" class="quantity form-control input-number" value="1"  min="1" max="100">
                  </div>
                </td>
                <td>
                  <a href='/removecart/{{$order->id}}' type="button" class="close" data-dismiss="alert" aria-label="Close"  function="forget">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                  </a>
                </td>
              </tr>
              @php $totalprice = $totalprice + $order->price; @endphp
              @endforeach
              <tr>
                <td>
                  <div class="section-heading price">
                    <h2> <em>Totaalprijs:</em></h2>
                  </div>
                </td>
                
                <td>
                  <div class="section-heading price ">
                  


                    <h2> €  {{$totalprice}}</h2>    
                            
                  </div>
                </td>
                
              </tr>          
            </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-4">
      <div class="form-group ">
        <label for="exampleFormControlSelect1">Kies een bezorgoptie</label>
        <select class="form-control" name="type">
          @foreach ($types as $type)
          <option value="{{$type->id}}">{{$type->name}}</option>
          @endforeach
        </select>
        </div>
    </div>
  </form>
    <!--order button -->   
    <button type="submit" class="buy-btn">Betaal</button>
</div>

@endsection
