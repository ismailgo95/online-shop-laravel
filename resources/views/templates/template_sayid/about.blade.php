@extends('templates.master')

@section('title', 'Aboute')



@section('style')
<style>
    .header_cards {
        width: 6rem;
        height: 6rem;
        display: inline-block;
        text-align: center;
        line-height: 6rem;
        border-radius: 1rem;
        margin-bottom: 3px;
    }

</style>
@endsection

@section('content')
<main class="pt-3">
    <div class="jumbotron">
        <h1 class="display-4">About This Store</h1>
    </div>
</main>

<div class="row">
    <div class="col-md-6">
        <div class="jumbotron"
            style="background:url('https://media.gettyimages.com/photos/small-cup-of-coffee-on-bright-yellow-background-picture-id516652078?b=1&k=6&m=516652078&s=612x612&w=0&h=u3NsZvYpO9MMrC6b6NQtx64nVGaYqim0GJHwIWyuu7k=');background-size: cover; height: 18rem;">
            <h1 class="display-4">Welcome to the Store</h1>
        </div>
    </div>
    <div class="col-md-6">
        <div class="jumbotron bg-white">
            @for($i=0;$i<6;$i++) <div class="header_cards border">
                <a>Cards</a>
        </div>
        @endfor
    </div>
</div>


@endsection
