<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{url('/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- Link Font Google --}}
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    {{-- Link Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.theme.green.min.css') }}">

    <title>@yield('title')</title>

    @yield('style')
    <style>
        #keranjang {
            border-radius: 50% 5px 50% 50%;
            position: fixed;
            bottom: 3rem;
            right: 3rem;
            width: 4rem;
            height: 4rem;
            line-height: 4.3rem;
            text-align: center;
            background: #f9423a;
        }

        #keranjang_jumlah {
            position: absolute;
            background: salmon;
            border-radius: 50%;
            bottom: 0;
            left: -0.5rem;
            width: 2rem;
            height: 2rem;
            line-height: 2rem;
            color: white;
        }

        .dropdown-item {
            height: 3rem;
            line-height: 3rem;
        }

    </style>
</head>

<body>

    @if( Route::is('login','register'))
    <div class="container">

        @yield('content')

    </div>



    <footer class="fixed-bottom">
        <div class="container text-center pb-1">
            Made Whit Love for Indonesia
        </div>
    </footer>
    @else
    <div class="container">
        @include('components.navbar')

        @yield('content')

    </div>

    <footer class="container">
        @include('components.footer')
        <div id="keranjang">
            <div id="keranjang_jumlah">
                5
            </div>
            <div class="dropdown mr-1">
                <i class="fa fa-cart-plus fa-2x" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-offset="10,20" style="color: white"></i>
                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuOffset" style="width: 15rem">
                    <p class="dropdown-item">keranjang</p>
                </div>
            </div>
        </div>
    </footer>
    @endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{asset('/owlcarousel/owl.carousel.min.js')}}"></script>

    @yield('script')
</body>

</html>
