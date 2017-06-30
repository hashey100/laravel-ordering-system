@extends('layouts.master')
@section('title')
Laravel Shopping Cart
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
                <button type="button" class="btn btn-default">New Client </button>
                <a href="/login">
                  <a type="button" href="{{route('user.signin')}}" class="btn btn-default">Returning Client </a>
                </a>
        </div>
    </div>
@endsection
