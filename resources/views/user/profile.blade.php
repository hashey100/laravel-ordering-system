@extends('layouts.master', ['body_class' => 'profile'])
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="page-header">
        Dashboard
      </h1>

        <div class="panel panel-default">
            <div class="panel-body">
                <div><span>Name: {{ Auth::user()->name }}</span></div>
                <div><span>Email: {{ Auth::user()->email }}</span></div>
                <div><span>Contact No: {{ Auth::user()->contact_no }}</span></div>
                <div><span>Name of Practice: {{ Auth::user()->name_of_practice }}</span></div>
                <div><span>Tier: {{ Auth::user()->tier }}</span></div>
                <div><span>Warehouse: {{ Auth::user()->warehouse }}</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
