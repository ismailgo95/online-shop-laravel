@extends('templates.template_ismail.master')
@section('content')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Product</strong></div>
    </div>
  </div>
</div>

{{-- @php
    use Product;
    $products = Pro
@endphp --}}

<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-9 order-2">

        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
            <div class="d-flex">
              <div class="dropdown mr-1 ml-md-auto">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                  <a class="dropdown-item" href="#">Men</a>
                  <a class="dropdown-item" href="#">Women</a>
                  <a class="dropdown-item" href="#">Children</a>
                </div>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                  <a class="dropdown-item" href="#">Relevance</a>
                  <a class="dropdown-item" href="#">Name, A to Z</a>
                  <a class="dropdown-item" href="#">Name, Z to A</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Price, low to high</a>
                  <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if ( Session::has("success") )
        <div class="alert alert-success ">{{Session::get('success')}}</div>
        @endif
        @if ( Session::has("error") )
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <div class="row mb-5">
          @foreach ($product as $item)
          <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
            <div class="block-4 text-center border" style="inline-block">
                <figure class="block-4-image">
                  <a href="{{url('product')}}/{{$item->id}}"><img src="{{url('')}}/product/{{$item->image}}" width="300px" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="{{url('product')}}/{{$item->id}}">{{$item->name}}</a></h3>
                  <span class="badge badge-primary">Stock : {{$item->stock}}</span>
                  <p class="mb-0">{{$item->varian}}</p>
                  <p class="text-primary font-weight-bold">Rp. {{ number_format($item->price)}} ,-</p>

                  <form action='{{url('/cart/add')}}' method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <input type="submit" class="btn btn-sm btn-primary" value="Beli Sekarang">
                  </form>

                </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
          <ul class="list-unstyled mb-0">
            @foreach ($categories as $row)
              <li class="mb-1"><a href='{{url("/products?categorie=$row->id")}}' class="d-flex"><span>{{$row->name}}</span> <span class="text-black ml-auto">(2,220)</span></a></li>
            @endforeach
          </ul>
          
        </div>

        <div class="border p-4 rounded mb-4">
          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div>

          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
            <label for="s_sm" class="d-flex">
              <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
            </label>
            <label for="s_md" class="d-flex">
              <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
            </label>
            <label for="s_lg" class="d-flex">
              <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
            </label>
          </div>

          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
            <a href="#" class="d-flex color-item align-items-center" >
              <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
              <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
              <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
              <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
            </a>
          </div>

        </div>
      </div>
    </div>
@endsection