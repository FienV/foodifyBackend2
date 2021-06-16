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
<div class="container" method="post" action="/validation">
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
                 <input type="number" id="amount" name="amount" class="quantity form-control input-number"  min="1" max="100">
              </div>
            </td>
            <td>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-close"></i></span>
              </button>
            </td>
          </tr>
          @endforeach
        </div>
         </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<!--order button --> 
<div class="col-md-4">
  <div class="form-group mt-3">
    <label for="exampleFormControlSelect1">Kies een bezorgoptie</label>
     <select class="form-control" name="type">
      @foreach ($types as $type)
      <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
    </select>
    </div>
</div>
<button type="submit" class="btn btn-primary m-3" action="/order">
  <span >Bestellen</span>
</button>
</div>

@endsection
