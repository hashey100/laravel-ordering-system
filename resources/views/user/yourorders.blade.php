@extends('layouts.master', ['body_class' => 'your-orders'])
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      @if(count($orders) === 0)
      <h1 class="page-header">
        No Orders
      </h1>
      @else
      <h1 class="page-header">
       Your Orders
      </h1>
        <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-striped">
          <thead>
            <tr>
              <th>Order</th>
              <th>Date</th>
            </tr>
            </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>
                      <a href="{{ route('user.getorderDetails', ['id' => $order->id]) }}">
                      Order: {{$loop->iteration}}
                      </a>
                    </td>
                    <td>
                      Date: {{$order->created_at}}
                    </td>
                  </tr>
                  @endforeach
                  <tbody>
                </table>
            </div>
        </div>
          @endif
    </div>
</div>
@endsection
