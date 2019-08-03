@extends('templates.admin')
@section('title', 'Dashboard')

@section('content')
<section id="product" class="pb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 align='center'>Data Penjualan</h4>
            <form class="d-none d-sm-inline-block form-inline my-md-0 mw-100 navbar-search" method="POST" action="{{url('dashboard/saleitem/search')}}">
              @csrf
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Detail Penjualan"aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
            {{-- Flash Message --}}
            @if ( Session::has("success") )
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if ( Session::has("error") )
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            {{-- Flash Message --}}
            <div class="table-responsive pt-4">
              <table id="table-product" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Bank</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th width="200px">action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sales as $sale)
                  <tr>
                    <td>{{$sale->nama}}</td>
                    <td>{{$sale->email}}</td>
                    <td>{{$sale->phone}}</td>
                    <td>{{$sale->alamat}}</td>
                    <td>{{$sale->bank}}</td>
                    <td align="center">
                      @if($sale->bukti == null)
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$sale->id}}">
                        <small>Belum Bayar</small> 
                      </button>
                      @else
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$sale->id}}">
                        <small>Sudah Bayar</small> 
                      </button>
                      @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <img src="{{asset('bukti')}}/{{$sale->bukti}}" alt="{{$sale->bukti}}">
                          </div>
                          <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                    <td>{{$sale->status}}</td>
                    <td>
                      <form action="{{url('dashboard/saleitem',$sale->id)}}/destroy" method="POST" style='display:inline-block'>
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger" onClick="return confirm('yakin ?')"><i class="fas fa-trash"></i></button>
                      </form>
                      <a href="{{url('dashboard/saleitem',$sale->id)}}/detail"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                      <a href="{{url('dashboard/statusadmin',$sale->id)}}/status" class="btn btn-success"><i class="fas fa-paper-plane"></i></a>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{-- Pemanggilan Paginate dibuat 3 data --}}
              <div class="paging">
                {{$sales->links()}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop