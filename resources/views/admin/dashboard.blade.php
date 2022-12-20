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
      <th scope="col">Capital</th>
      <th scope="col">Working Capital</th>
      <th scope="col">Withdraws</th>
      <th scope="col">Sales</th>
      <th scope="col">Profits</th>
      <th> <a href="{{url('initiate')}}"><button class="btn btn-block btn-success">Initiate</button></a></th>
      <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcapital">Add Capital</button></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $investment)
    <tr>
      <td>{{$investment->capital}}</td>
      <td>{{$investment->workingcapital}}</td>
      <td>{{$investment->withdraws}}</td>
      <td>{{$investment->sales}}</td>
      <td>{{$investment->profits}}</td>
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
<div class="modal fade" id="addcapital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Capital</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('addcapital')}}" method="post">

      <div class="modal-body">
        @csrf
        <input class="form-control" type="number" min="0" name="capital" id="" placeholder="Input Capital">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>