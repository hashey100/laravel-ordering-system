@extends('layouts.master', ['body_class' => 'checkout'])

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-2 col-sm-offset-2">
      <h1 class="page-header">
      Thank you for purchasing our products
      </h1>
      <h4>Your Total is: £{{$total}}</h4>
    </div>
  </div>
@endsection
