@extends('layouts.master', ['body_class' => 'shopping-cart'])

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

          <h1 class="page-header">
           Shopping Cart
          </h1>
                <ul class="list-group">
                    @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <form action="updateProd" method="post">
                                  <strong>{{ $product['item']['title'] }}</strong>
                                  <span class="label label-success">{{ $product['price'] }}</span>
                                  <a type="button" class="btn btn-primary btn-xs reduceProd">-</a>
                                  <a type="button" class="btn btn-primary btn-xs addProd">+</a>
                                  <input name="qty" value=""/>
                                  <input name="id" value="{{ $product['item']['id'] }}" type="hidden"/>
                                  <a type="button" class="btn btn-primary btn-xs"  href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Remove</a>
                                  <input class="btn btn-primary btn-xs"  type="submit" value="Update"  />
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </li>
                    @endforeach
                </ul>
              </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
                <strong>Total: {{ $totalPrice }}</strong>
              </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <?php  if (Auth::check()) { ?>
                <a type="button" href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
              <?php   }
              else
              {  ?>
                <a type="button" href="{{route('user.signin')}}" class="btn btn-success">Login</a>
            <?php  } ?>
            </div>
        </div>
        @else
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

                <h1 class="page-header">
                  No Items in Cart!
                </h1>
              </div>
        </div>
    @endif
@endsection
