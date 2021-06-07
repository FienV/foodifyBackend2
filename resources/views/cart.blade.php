@extends('layout.theme')
@section('content')

<!--header --> 

<div class="page-heading header-text">
  <div class="container">
     <div class="row">
       <div class="col-md-12">
          <h2>Winkelmandje</h2>
       </div>
     </div>
   </div>
</div>


<!--cart-->
<div class="row">
  <div class="col-md-12">
    <div class="table-wrap">
      <table class="table">
        <thead class="thead-primary">
          <tr>
            <th>Gerecht</th>
            <th>Prijs</th>
            <th>Hoeveelheid</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($dishes as $dish)
          <tr class="alert" role="alert">
            <td>
              <div class="email">
                <span>{{$dish->name}} </span>
                <span>{{$dish->description}}</span>
              </div>
            </td>
            <td>€ {{$dish->price}}</td>
            <td class="quantity">
              <div class="input-group">
                 <input type="text" name="quantity" class="quantity form-control input-number"  min="1" max="100">
              </div>
            </td>
            <td>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-close"></i></span>
              </button>
            </td>
          </tr>
         </tbody>
      </table>
    </div>
  </div>
</div>
@endforeach
<!--order button --> 

<button type="button" class="btn btn-primary" action="/order">
  <span >Bestellen</span>
</button>


@endsection