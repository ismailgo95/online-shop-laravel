@extends('templates.template_ismail.master')

@section('content')
<script type="text/javascript">  

function hitung(){  
var qty   = document.getElementById("qty").value;
var price = document.getElementById("price").value;
alert(qty*price);
// var result = (parseInt(b1) * h_b1) + (parseInt(b2) * h_b2) + (parseInt(b3) * h_b3);
//   if (!isNaN(result)) {
//     document.getElementById('total').value = result;
//   }
}  
</script>  
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
  </div>
</div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="site-blocks-table">
            {{-- Alert Berhasil Atau Tidaknya --}}
            @if ( Session::has("success") )
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if ( Session::has("error") )
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            {{-- Alert Berhasil Atau Tidaknya --}}
            @if (Auth::check())
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Name Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @php $total = 0; @endphp
                @foreach ($carts as $cart)
                <tr>
                  <td class="product-thumbnail">
                    <img src="{{url('')}}/product/{{$cart->image}}" alt="Image" class="img-fluid" width="50%">
                  </td> 
                  <td class="product-name">
                    <h2 class="h6 text-black">{{$cart->name}}</h2>
                  </td>
                  <form action="{{url('/cart/update')}}" method="POST">
                    @csrf
                    <td class="product-price" id="price">Rp. {{ number_format($cart->price) }} ,-</td>
                    <td class="product-quantity">
                      <div class="input-group mb-3">
                        <input type="number" name="qty" id="qty" class="form-control text-center" value="{{$cart->qty}}" placeholder="" min="1" max="100">
                        @error('qty')
                          <div class="">{{$message}}</div>
                        @enderror
                        @error('id')
                          <div class="">{{$message}}</div>
                        @enderror
                      </div>
                        <input type="hidden" name="id" value="{{$cart->id}}">
                        <input type="submit"  class="btn btn-primary btn-sm form-control" value="Update">
                    </td>
                  </form> 
                    <td id="total">
                    @php 
                      $total = $cart->qty * $cart->price;
                      $totalAll = !isset($totalAll) ? $totalAll = $total : $total + $totalAll ;
                    @endphp
                      Rp. {{number_format($total,0)}} ,-
                    </td>
                    <td><a href="{{url('cart',$cart->id)}}/hapus" class="btn btn-danger btn-sm">X</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <a href="{{url('/cart')}}" class="btn btn-primary btn-sm btn-block">Update Cart</a>
            </div>
            <div class="col-md-6">
              <a href="{{url('/products')}}" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">Rp. {{number_format($totals->total,0)}} ,-</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  @if (count($carts) > 0)
                    <a href="{{ url('/checkout')}}" class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <h3 class="text-center mb-3">You Must <a href="{{route('login')}}">Login</a> </h3>
  <table class="table table-bordered mb-5">
    <thead class="mb-5">
      <tr>
        <th class="product-thumbnail">Image</th>
        <th class="product-name">Name Product</th>
        <th class="product-price">Price</th>
        <th class="product-quantity">Quantity</th>
        <th class="product-total">Total</th>
        <th class="product-remove">Remove</th>
      </tr>
    </thead>
  </table>    
  @endif
@stop