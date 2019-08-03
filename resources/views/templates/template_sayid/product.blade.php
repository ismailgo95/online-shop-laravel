@extends('templates.master')

@section('title', 'Product')



@section('style')
<style>
    .cards_product_list {
        text-align: center;
    }

    .card_product {
        border: 1px solid black;
        border-radius: 1rem;
        overflow: hidden;
        display: inline-block;
        width: 12rem;
        height: 22rem;
        margin: 5px;
    }

    @media(max-width: 480px){
        .card_product {
            border: 1px solid black;
            border-radius: 1rem;
            overflow: hidden;
            display: inline-block;
            width: 10rem;
            height: 18rem;
        }
    }
</style>
@endsection


@section('content')

<form action="/product/search" method="get">
    <div class="input-group">
        <input type="search" name="search" class="form-control">

        <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
        </span>
    </div>
</form>



<div id="container">
</div>
    <div class="cards_product_list">
        @foreach ($product as $item)
        <div class="card_product">
                <img src="{{url('')}}/storage/product/{{$item->image}}" style="width : 110px;"
                    class="card-img-top" alt="coffe">
                <div class="card-body">
                    <p class="card-text">{{$item->name}}</p>
                    <h3 class="card-title">{{$item->varian}}</h3>
                    <p class="card-text">Rp. {{$item->price}}</p>
                    <a href="{{route('product.show',$item->id)}}" class="btn btn-primary">Buy Here!</a>
                </div>
            </div>
        @endforeach
            @if( Session::has("success"))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if( Session::has("error"))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
    </div>
@endsection
