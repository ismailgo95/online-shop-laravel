@section('title', 'Dashboard')

@extends('templates.admin')
@section('content')
<section class="pb-4">
  <div class="container-fluid">
    <form action="{{url('dashboard/product')}}/{{$product->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-6">
          <div class="card border-info">
            <div class="card-body">
              <div class="form-group">
                <label for="kategori">Code Product</label>
                <input type="text" class="form-control form-control-lg" required="" name="code_product" id="code_product" placeholder="Masukan Code Product" value="{{$product->code}}">
              </div>
              <div class="form-group">
                <label for="nama_buku">Nama Product</label>
                <input type="text" class="form-control form-control-lg" required="" name="nama_product" id="nama_product" placeholder="Masukan Nama Product" value="{{$product->name}}">
              </div>
              <div class="form-group">
                <label for="penerbit">Varian</label>
                <input type="text" class="form-control form-control-lg" name="varian" id="varian" aria-describedby="varian" placeholder="Masukan Varian" value="{{$product->varian}}">
              </div>
              <button type="submit" name="btnSimpan" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> SIMPAN</button>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card border-info">
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="harga">Price</label>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="price" placeholder="Harga Buku" value="{{$product->price}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="stok">Stock</label>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="stock" id="stock" aria-describedby="stock" placeholder="Stok Buku" value="{{$product->stock}}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <img src="images/cover-kosong.png" id="tampil" name="tampil" class="shadow p-1  bg-light rounded" alt="" style="width: 170px;">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <input type="file" name="file" class="form-control-sm" id="file">
                    &nbsp;&nbsp;<i><small id="cover" class="form-text text-muted mt-0">**Ukuran file cover Maks. 10 MB;.</small></i>
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