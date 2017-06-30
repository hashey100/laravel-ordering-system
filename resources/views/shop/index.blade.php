@extends('layouts.master', ['body_class' => 'products'])
@section('title')
Laravel Shopping Cart
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">

  <h1 class="page-header">
    Products
  </h1>
  <div class="header-list">
    <span>Title</span>
    <span>Description</span>
    <span>Price</span>
    <span class="qty">Quantity</span>
  </div>
<div class="prods">
@foreach($products as $product)
<form action="../product/addnew" method="post" class="prodlist">
  <div>
  <label  data-toggle="modal" data-target="#myModal{{$loop->iteration}}">{{$product->title}}</label>
  <input type="hidden" name="title[]" value="{{$product->title}}"/>
  <input type="hidden" name="id[]" value="{{$product->id}}"/>
  <label>{{$product->description}}</label>
  <input type="hidden" name="description[]" value="{{$product->description}}"/>
  <label>{{$product->price}}</label>
  <input type="hidden" name="price[]" value="{{$product->price}}"/>
  <input name="qty[]" value=""/>
  <a type="button" class="btn btn-primary btn-xs reduceProd">-</a>
  <a type="button" class="btn btn-primary btn-xs addProd">+</a>
  </div>
@endforeach
  </div>
  <div class="buttonGroup">
<input type="submit"  value="Add to cart" class="btn btn-primary btn-sm"/>
<a type="button" class="btn btn-primary btn-sm"  href="{{ route('product.filter')}}">Filter A-Z</a>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
</form>
@foreach($products as $product)

<!-- Modal -->
<div class="modal fade" id="myModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$product->title}}</h4>
      </div>
      <div class="modal-body">
      <img src="{{$product->imagePath}}"   />
      <p>Description: {{$product->description}}  </p>
      <p>Price: {{$product->description}}  </p>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
</div>
@endsection
