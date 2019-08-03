@section('title', 'Dashboard')
@extends('templates.admin')
@section('content')

<section class="pb-4">
  <div class="container-fluid">
    <form action="{{url('dashboard/product')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="card border-info">
            <div class="card-body">
              <div class="form-group">
                <label for="code_product">Code Product</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Masukan Code Product">
                @error("code")
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama_product">Nama Product</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Product">
                @error("name")
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>
              <div class="form-group">
                <label for="varian">Varian</label>
                <select name="varian" id="categorie_id" class="form-control">
                    <option value="">Pilih Variant</option>
                    @foreach($list_variant as $var)
                    <option value="{{$var}}">{{$var}}</option>
                    @endforeach
                </select>
                @error("varian")
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Deskripsi Product</label>
                <textarea name="description" id="description" cols="10" rows="3" class="form-control" placeholder="Masukan Deskripsi Tentang Kopi"></textarea>
                @error("description")
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
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
                    <label for="price">Price</label>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="price" placeholder="Masukan Harganya">
                      </div>
                    </div>
                    @error("price")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <label for="stock">Stock</label>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="stock" id="stock" aria-describedby="stock" placeholder="Jumlah Stock">
                      </div>
                    </div>
                    @error("stock")
                      <div class="badge badge-danger"><small>{{$message}}</small></div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="categorie_id">categorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control">
                    <option value="">Pilih Catagorie</option>
                    @foreach($list_categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                </select>
                @error("categorie_id")
                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                @enderror
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                  <img src="{{url('')}}/image/cover-kosong.png" id="tampil" name="tampil" class="shadow p-1  bg-white rounded" alt="" style="width: 105px;">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <input type="file" name="image" class="form-control-sm" id="image" onchange="readURL(this);" >
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
