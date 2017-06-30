@extends('layouts.master', ['body_class' => 'sign-in'])
@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-3">
    <h1 class="page-header">
      Sign In
    </h1>
    @if(count($errors)>0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <p>{{$error}}</p>
      @endforeach
    </div>
    @endif
    <form action="{{route('user.signin')}}" method="post">
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control"/>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control"/>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Sign In</button>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
