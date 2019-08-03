@extends('tamplates.master')

@section('title', 'Product')

@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="jumbotron jumbotron-fluid"
        style="background:url('https://media.gettyimages.com/photos/small-cup-of-coffee-on-bright-yellow-background-picture-id516652078?b=1&k=6&m=516652078&s=612x612&w=0&h=u3NsZvYpO9MMrC6b6NQtx64nVGaYqim0GJHwIWyuu7k=');background-size: cover; height: 25rem;"
        ></div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-catagorie">
                    <div class="btn btn-primary btn-sm">Arabica</div>
                    <div class="btn btn-primary btn-sm">Top List</div>
                    <div class="btn btn-primary btn-sm">Indonesia</div>
                </div>
                <h2 class="card-title pt-3">{{$data->name}}</h2>
                <p class="card-text">{{$data->description}}</p>
                <hr>
                <div class="card-price">
                        <h3 class="card-title">Rp, {{$data->price}}/kg </h3>
                        <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control border-dark" placeholder="5 KG">
                                </div>
                                <div class="btn-group btn-group-toggle col-4">
                                    <button class="btn btn-secondary btn-md"> - </button>
                                    <button class="btn btn-danger btn-md"> + </button>
                                </div>
                            </div>
                        <h6 class="card-subtitle text-muted pt-3">Total Pesanan</h6>
                        <h4 class="card-title">Rp, 500.000 <small class="text-muted">( 50.000 x 5 )</small> </h4>
                        <button type="button" class="btn btn-danger btn-block">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{mix('js/app.js')}}" ></script>
@endsection
