@extends('templates.template_ismail.master')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{url('')}}/product/{{$detail->image}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$detail->name}}</h2>
          <p>{{$detail->description}}</p>
          <p><strong class="text-primary h4">Rp. {{number_format($detail->price),'.','.'}},-</strong></p>
          <span class="badge badge-primary">Stock : {{$detail->stock}}</span><br><br>
         <form action='{{url('/cart/add')}}' method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$detail->id}}">
          <input type="submit" class="btn btn-sm btn-primary" value="Beli Sekarang">
          </form>

        </div>
      </div>
    </div>
  </div>
@stop