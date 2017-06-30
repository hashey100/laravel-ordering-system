@extends('layouts.master', ['body_class' => 'your-order-details'])
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="page-header">
       Order Details
      </h1>
        <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Title</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
            </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->title}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->price}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
                <a href="{{ route('product.remakeOrder', ['id' => $orderid]) }}"  class="btn btn-success" role="button">Remake Order</a>
            </div>
        </div>
    </div>
</div>
@endsection
