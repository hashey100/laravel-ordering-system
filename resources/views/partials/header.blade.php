<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('product.index')}}">Actavis Hub</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
 User Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(Auth::check())
            <li><a href="{{route('user.logout')}}">Log out</a></li>
            @else
            <li><a href="{{route('user.signin')}}">Sign in</a></li>
            <li><a href="{{route('user.signup')}}">Sign up</a></li>
            @endif
            <li role="separator" class="divider"></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

 <ul class="sidebar-nav navbar-nav">
   @if(Auth::check())
   <li class="nav-item dashboard">
         <a class="nav-link" href="{{route('user.profile')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
   </li>
     @endif
   <li class="nav-item products">
         <a class="nav-link" href="{{route('index.home')}}"><i class="fa fa-fw fa-dashboard"></i> Products</a>
   </li>
      <li class="shopping-cart"><a href="{{route('product.shoppingCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
    Shopping Cart <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty: ''}}</span></a>
    </li>
    @if(Auth::check())
    <li class="nav-item orders">
          <a class="nav-link" href="{{route('user.yourOrders')}}"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
    </li>
      @endif
  </ul>
</nav>
