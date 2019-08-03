@extends('templates.template_ismail.master')

@section('content')
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a href="/cart">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <h2 class="h3 mb-3 text-black text-center">PLACE CUSTOMER</h2>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <div class="p-3 p-lg-5 border">
              <form action="{{url('/sale/add')}}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Your Name </label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Inser Your Name">
                    @error("nama")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Insert Your Email">
                    @error("email")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="phone" class="text-black">Phone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Insert Your Phone">
                    @error("phone")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="alamat" class="text-black">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Insert Street address">
                    @error("alamat")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='templates.template_ismail.thanks'">Place Order</button>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="border p-3 mb-3">
              <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
              <!-- Group of default radios - option 1 -->
              <div class="custom-control custom-radio pt-3">
                <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="bank" value="BTN">
                <label class="custom-control-label" for="defaultGroupExample1">
                  <img src="{{ asset('image/btn.png') }}" alt="" height="50px">
                  <strong>&nbsp; : 1234-4567-8910-9898</strong>
                </label>
                @error("bank")
                  <br>
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>
              <!-- Group of default radios - option 2 -->
              <div class="custom-control custom-radio pt-5">
                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="bank" value="BRI">
                <label class="custom-control-label" for="defaultGroupExample2">
                  <img src="{{ asset('image/bri.png') }}" alt="" height="50px">
                  <strong>&nbsp; : 9090-9090-9090-1234</strong>
                </label>
                @error("bank")
                  <br>
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

@stop