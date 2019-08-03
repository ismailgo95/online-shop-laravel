@section('title', 'Dashboard')

@extends('tamplates.admin')
@section('content')

<section class="pb-4">
  <div class="container-fluid">
    <div class="card">
            
      @if ( Session::has("error"))
          <div class="alert alert-danger">{{Session::get("error")}}</div>
      @endif

      @if ( Session::has("success"))
          <div class="alert alert-success">{{Session::get("success")}}</div>
      @endif
    <form action="{{route('template.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="card border-info">
            <div class="card-body">
              <div class="form-group">
                <label for="kategori">Template Name</label>
                <input type="text" class="form-control form-control-lg" required="" name="name" id="name" placeholder="Masukan Code Product">
                </div>
                
                <div class="form-group">
                <label for="nama_buku">Folder</label>
                <input type="text" class="form-control form-control-lg" required="" name="folder" id="folder" placeholder="Masukan Folder">
                </div>
                <div class="form-group">
                    <label for="nama_buku">Selected</label>
                    <input type="text" class="form-control form-control-lg" required="" name="selected" id="selected" placeholder="Masukan Nama Product">
                    </div>
                </div>
               </div>
                <button type="submit" name="btnSimpan" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> SIMPAN</button>
                </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <a href="{{url('dashboard/template')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

@stop