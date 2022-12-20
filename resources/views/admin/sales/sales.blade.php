@extends('layouts.app');
@section('content')
@include('admin.menus.adminmenus')
@include('includes.dashboardheader')

<div class="row">
    <div class="col-12">
    <div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Item Sold</th>
      <th scope="col">Quantity Sold</th>
      <th scope="col">Amount Sold</th>
      <th scope="col">Expenditure Purpose</th>
      <th scope="col">Ependiture Amount</th>
      <th scope="col">Total Price</th>
      <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addsales">Sell</button></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($sales as $sale)
    <tr>
      <td>{{$sale->itemsold}}</td>
      <td>{{$sale->quantitysold}}</td>
      <td>{{$sale->amountsold}}</td>
      <td>{{$sale->expenditure}}</td>
      <td>{{$sale->expenditureamount}}</td>
      <td>{{$sale->totalprice}}</td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
    </div>
</div>

@endsection
@include('includes.dashboardfooter')

<!-- Modal -->
<div class="modal fade" id="addsales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sale</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('addsales')}}" method="post">

      <div class="modal-body">
        @csrf
        <div class="form-group">
            <input class="form-control mb-2" type="text" min="0" name="itemsold" id="" placeholder="Enter Item Sold">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="quantitysold" id="" placeholder="Input Quantity Sold">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="amountsold" id="" placeholder="Input Sale Price">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="text" name="expenditure" id="" placeholder="Input Expenditure Purpose">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="expenditureamount" id="" placeholder="Input Expenditure Amount">
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Add Sales</button>
      </div>
      </form>
    </div>
  </div>
</div>