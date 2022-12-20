@extends('layouts.app');
@section('content')
@include('admin.menus.adminmenus')
@include('includes.dashboardheader')

<div class="row">
    <div class="col-12">
    <div class="table-responsive">
  <table class="table">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">Item Stocked</th>
      <th scope="col">Stock Quantity</th>
      <th scope="col">Stock Amount</th>
      <th scope="col">Stock Price</th>
      <th scope="col">Sales Price</th>
      <th scope="col">Profits</th>
      <th> <a href="{{url('initiate')}}"><button class="btn btn-block btn-success">Initiate</button></a></th>
      <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addstock">Add Stock</button></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($stock as $stocks)
    <tr>
      <td>{{$stocks->itemstocked}}</td>
      <td>{{$stocks->stockquantity}}</td>
      <td>{{$stocks->stockamount}}</td>
      <td>{{$stocks->stockprice}}</td>
      <td>{{$stocks->saleprice}}</td>
      <td>{{$stocks->profits}}</td>
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
<div class="modal fade" id="addstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Stock</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('addstock')}}" method="post">

      <div class="modal-body">
        @csrf
        <div class="form-group">
            <input class="form-control mb-2" type="text" min="0" name="itemstocked" id="" placeholder="Enter Stock Item">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="quantity" id="" placeholder="Input Stock Quantity">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="stockprice" id="" placeholder="Input Stock Price">
        </div>
        <div class="form-group">
            <input class="form-control mb-2" type="number" name="saleprice" id="" placeholder="Input Stock Sales Price">
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Add Stock</button>
      </div>
      </form>
    </div>
  </div>
</div>