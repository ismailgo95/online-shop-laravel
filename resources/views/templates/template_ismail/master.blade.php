<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Font Google --}}
    <link href="https://fonts.googleapis.com/css?family=Playball&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{asset('templates/template_ismail/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/owl.theme.default.min.css')}}">
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- Font Awesome --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('templates/template_ismail/css/style.css')}}">
    
  </head>
  <body>
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Store Shoes</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="#" id='button-cart' class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li>
                  {{-- Jquery --}}
                  <div id="sidebar" class="cart_close">
                    <br><h4 align='center'>Keranjang</h4>
                      <div id="menu" class="nav">
                      <a href="#" class="close">
                        <i class="fas fa-times"></i>
                      </a>
                    </div>
                  </div>
                  {{-- Jquery --}}

                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      @php
      use App\Categorie;
      $categories = Categorie::all();
      @endphp
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
              <a href="{{ url('/') }}">Home</a>
            </li>
            {{-- <li class="has-children">
              <a href="#">Categorie</a>
              <ul class="dropdown">
                @foreach ( $categories as $categorie )
                  <li><a href="#">{{ $categorie->name }}</a></li>
                @endforeach
              </ul>
            </li> --}}
            <li class="has-children">
              <a href="#">Shop</a>
              <ul class="dropdown">
                  <li><a href="{{url('/products')}}">Product</a></li>
                  <li><a href="{{url('/cart/')}}">Cart</a></li>
                  @auth
                  <li><a href="{{url('/status')}}">Status Pengiriman</a></li>
                  @endauth
              </ul>
            </li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
            <li><a href="{{url('/aboute')}}">About</a></li>
            <li>
              @auth
              <form action="{{ route('logout') }}" method="post">
                @csrf
              <button type="submit" class="btn btn-outline-danger ">Logout</button>
              </form>
              @else
              <a style="color:black" class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
              <a style="color:black" class="btn btn-outline-primary" href="{{ route('register') }}">Registrasi</i></a>
              @endauth
            </li>
          </ul>
        </div>
      </nav>
    </header>
    {{-------------------------- INI CONTENT ----------------------------}}
      @yield('content')
    {{-------------------------- AKHIR CONTENT -------------------------------}}

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="{{asset('templates/template_ismail/images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
              <p>Promo from  nuary 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('templates/template_ismail/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/jquery.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/jquery-ui.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/popper.min.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/aos.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/main.js')}}"></script>
  <script src="{{asset('templates/template_ismail/js/myscript.js')}}"></script>
  <script src="{{asset('js/myscript.js')}}" ></script>
    
  </body>
</html>