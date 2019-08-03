@section('title', 'Add Pages')

@extends('templates.admin')
<style>
    .form_input_content {
        height: 20rem !important;
    }

</style>
@section('style')


@endsection

@section('content')
<section class="pb-4">
    <div class="container-fluid">
        <form action="{{url('dashboard/pages')}}" method="POST">
            @csrf

            <div class="card border-info">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control form-control-lg" name="judul" id="judul"
                            placeholder="Masukan Judul">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control form_input_content" id="exampleFormControlTextarea1" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block"><i
                            class="fa fa-save"></i> SIMPAN</button>
                </div>

            </div>
</section>

@stop
