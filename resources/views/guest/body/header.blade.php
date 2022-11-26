<header class="header mb-5">
    <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-lg-right">
                    <ul class="menu list-inline mb-0">
                        <!-- <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li> -->
                        @guest
                            <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                            <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="list-inline-item"><a
                                    href="{{ route('dashboard') }}">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                            </li>
                            <li class="list-inline-item"><button class="btn btn-primary"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

        <!-- ------------  Login  ------------ -->

        <!-- <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
         <div class="modal-dialog modal-sm">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Customer login</h5>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="customer-orders.html" method="post">
                     <div class="form-group">
                        <input id="email-modal" type="text" placeholder="email" class="form-control">
                     </div>
                     <div class="form-group">
                        <input id="password-modal" type="password" placeholder="password" class="form-control">
                     </div>
                     <p class="text-center">
                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                     </p>
                  </form>
                  <p class="text-center text-muted">Not registered yet?</p>
                  <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
               </div>
            </div>
         </div>
      </div> -->
        <!-- *** TOP BAR END ***-->


    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="{{ route('welcome') }}" class="navbar-brand home">
                <img class="rounded-circle" width="80" height="80" src="{{ asset('guest/img/petshop.jpg') }}"
                    alt="Obaju logo" class="d-none d-md-inline-block">
                <!-- <img class="rounded-circle" width="50" height="50" src="{{ asset('guest/img/petshop.jpg') }}" alt="Obaju logo" class="d-inline-block d-md-none"> -->
                <span class="sr-only">Pet Shop - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target="#navigation"
                    class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i
                        class="fa fa-align-justify"></i></button>
                    {{-- Product Search --}}
                {{-- <button type="button" data-toggle="collapse" data-target="#search"
                    class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i
                        class="fa fa-search"></i></button> --}}
                        <a href="{{ route('view-cart') }}"
                    class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>

                    {{-- Products --}}

                    <li class="nav-item"><a href="{{ route('shop') }}" class="nav-link">Shop</b></a></li>

                    {{-- Products --}}

                    {{-- Services --}}

                    <li class="nav-item dropdown menu-large">
                        <a href="{{ route('services.index') }}" class="nav-link">Services<b class="caret"></b>
                        </a>
                    </li>

                    {{-- Services End --}}
                </ul>
                <div class="navbar-buttons d-flex justify-content-end">
                    <!-- /.nav-collapse-->
                    <div id="search-not-mobile" class="navbar-collapse collapse">
                    </div>
                    {{-- //// Product Search //// --}}
                    <a data-toggle="collapse" href="#search"
                        class="btn navbar-btn btn-primary d-none d-lg-inline-block">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </a>
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                        <a href="{{ route('view-cart') }}" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{ session('cartCount') ?? 0}} items in cart</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="search" class="collapse">
        <div class="container">
            <form role="search" class="ml-auto" method="get" action="{{ route('shop') }}">
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control" name="filter">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
