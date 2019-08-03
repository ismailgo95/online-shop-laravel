@extends('templates.master')

@section('title', 'Store')

@php
use App\Categorie;
@endphp

@section('style')
<style>
    .header_cards {
        display: inline-block;
        line-height: 7rem;
        background: lightblue;
        height: 7rem;
    }

    .cards_wrapper {
        -webkit-overflow-scrolling: touch;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: center;
    }

    .card_product {
        border: 1px solid black;
        border-radius: 1rem;
        overflow: hidden;
        display: inline-block;
        width: 10rem;
        height: 18rem;
        flex: 0 0 auto;
        margin: 5px;
    }

    .JumboGambar {
        background-image: url('https://www.finansialku.com/wp-content/uploads/2018/06/Kopi-Termahal-02-Kopi-Finansialku.jpg');
        background-size: cover;
        font-family: 'Lobster', cursive;
        font-size: 19px;
        font-variant: inherit;
        text-shadow: 3px 2px 1px black;
        text-align: center;
    }

    /* Penambahan Style Jumbotron */
    @media(min-width: 768px) {
        .header_cards {
            display: inline-block;
            text-align: center;
            line-height: 7rem;
            background: lightcoral;
        }

        .card_product {
            width: 12rem;
            height: 20rem;
            margin: 5px;
        }

        .JumboGambar {
            background-image: url('https://www.finansialku.com/wp-content/uploads/2018/06/Kopi-Termahal-02-Kopi-Finansialku.jpg');
            background-size: cover;
            font-family: 'Lobster', cursive;
            font-size: 24px;
            font-variant: inherit;
            text-shadow: 3px 2px 1px black;
            text-align: center;
        }
    }

</style>
@endsection

@section('content')
{{-- Buat Pemanggilan Data Dari database --}}
@php
$categories = Categorie::all();
@endphp
{{-- Buat Pemanggilan Data Dari database --}}
<header class="pt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron"
                style="background:url('https://media.gettyimages.com/photos/small-cup-of-coffee-on-bright-yellow-background-picture-id516652078?b=1&k=6&m=516652078&s=612x612&w=0&h=u3NsZvYpO9MMrC6b6NQtx64nVGaYqim0GJHwIWyuu7k=');background-size: cover; height: 25rem;">
                <h1 class="display-4">Welcome to the Store</h1>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron bg-white row">
                @for($i=0;$i<4;$i++) <div class="header_cards col-3 col-md-3">
                    <a>Cards</a>
            </div>
            @endfor
        </div>
    </div>
</header>

{{-- CARD --}}
<div class="row">
    @for($i=0;$i<1;$i++)
    @foreach ($categories as $categorie) <div class="col-6 col-md-3">
        <div class="jumbotron JumboGambar bg-primary owl-carousel owl-theme" style="color:yellow;">
        {{ $categorie->name }}</div>
        </div>
    @endforeach
    @endfor
</div>

<div class="row">
    <div class="col-6 col-md-6">
        <div class="jumbotron"
            style="background:url('https://media.gettyimages.com/photos/small-cup-of-coffee-on-bright-yellow-background-picture-id516652078?b=1&k=6&m=516652078&s=612x612&w=0&h=u3NsZvYpO9MMrC6b6NQtx64nVGaYqim0GJHwIWyuu7k=');background-size: cover; height: 13rem;">
            <h1 class="display-6">Welcome to the Store</h1>
        </div>
    </div>
    <div class="col-6 col-md-6">
        <div class="jumbotron"
            style="background:url('https://media.gettyimages.com/photos/small-cup-of-coffee-on-bright-yellow-background-picture-id516652078?b=1&k=6&m=516652078&s=612x612&w=0&h=u3NsZvYpO9MMrC6b6NQtx64nVGaYqim0GJHwIWyuu7k=');background-size: cover; height: 13rem;">
            <h1 class="display-6">Welcome to the Store</h1>
        </div>
    </div>
</div>

{{-- card_product --}}

<div class="cards_wrapper">
    @for($i=0;$i<4;$i++) <div class="card_product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSZLsEuhDI522ip630fc4OtsNUhFw0YcuS6XB3AWsOslPYElbh"
            class="card-img-top" alt="coffe">
        <div class="card-body">
            <p class="card-text">Coffee</p>
            <h3 class="card-title">Toraja Coffee</h3>
            <a href="{{url('/product/detail')}}" class="btn btn-primary">Buy Here!</a>
        </div>
</div>
@endfor
</div>

@endsection
@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

</script>
@endsection
