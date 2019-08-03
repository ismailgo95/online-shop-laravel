@extends('templates.template_ismail.master')

@section('content')
<section class="">
  <div class="container pb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-body mt-3">
            @if ( Session::has("success") )
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if ( Session::has("error") )
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="table-responsive">
              <table id="list_categories" class="table table-striped table-bordered">
                <thead class="thead-light">
                  <tr align="center">
                    <th>No</th>
                    <th>Action</th>
                    <th>Upload Bukti Pembayaran</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @forelse ($sale as $row)
                  <tr >
                    <td style='text-align:center;vertical-align:middle'><h5>{{ $no++ }}</h5></td>
                    <td style='text-align:center;vertical-align:middle'>
                    @if($row->status == "Terkirim")
                      <form method="POST" action='{{url("status/$row->id/terimabarang")}}'>
                      @csrf
                      @method('PATCH')
                      <small><i></i></small>
                      <button type='submit' class="btn btn-sm btn-primary" onclick="return confirm('Apakah Anda Sudah Menerima Barang nya ?')">Menerima barang</button>
                      </form>
                    @elseif ($row->status == "Di Proses" || $row->status == "Tidak terkirim") 
                    <a onclick="return confirm('Apakah Anda Ingin Menghapusnya ?')" href='{{ url("status/$row->id/hapus") }}' class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}">
                      <i class="fas fa-eye"></i>
                    </button>
                      <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail Customer</h5>&nbsp;&nbsp;
                            <h5><span class="badge badge-secondary">Tanggal Pembelian : {{$row->created_at->format('d M Y')}}</span></h5>
                            &nbsp;&nbsp;
                            <h5><span class="badge badge-secondary">{{$row->created_at->diffForHumans()}}</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="POST" action='{{url("status/$row->id/edit")}}'>
                            @csrf
                            @method('POST')
                            <div class="row">
                              <div class="col-md-6">
                                <label for="nama" class="text-black" style="float:left">Your Name</label>
                                @error("nama")
                                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                                @enderror
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Edit Your Name" value="{{$row->nama}}">

                                <label for="email" class="text-black" style="float:left">Email</label>
                                @error("email")
                                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                                @enderror
                                <input type="text" class="form-control" id="email" name="email" placeholder="Edit Your Email" value="{{$row->email}}">

                                <br>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">{{$row->bank}}</span>
                                  </div>
                                  @if($row->bank == 'BTN')
                                  <input disabled type="text" class="form-control" value="1234-4567-8910-9898" aria-label="Username" aria-describedby="basic-addon1">
                                  @elseif($row->bank == 'BRI')
                                  <input disabled type="text" class="form-control" value="9090-9090-9090-1234" aria-label="Username" aria-describedby="basic-addon1">
                                  @endif
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="phone" class="text-black" style="float:left">Phone</label>
                                @error("phone")
                                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                                @enderror
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Edit Your Phone" value="{{$row->phone}}">

                                <label for="alamat" class="text-black" style="float:left">Alamat</label>
                                @error("alamat")
                                  <div class="badge badge-danger"><small>{{$message}}</small></div>
                                @enderror
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Edit Your Alamat" value="{{$row->alamat}}">

                                <br>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Total Bayar</span>
                                  </div>
                                  <input disabled type="text" class="form-control" value="Rp. {{number_format($price,0)}}" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    @endif
                    </td>
                    <td align="center">
                    @if($row->status == 'Tidak terkirim' || $row->status == 'Di Proses' )
                    <form action='{{url("/status/upload")}}' method="post" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="id" value="{{$row->id}}">
                      <input type="file" name="image" class="form-control-sm" id="image" onchange="readURL(this);" >
                      &nbsp;&nbsp;<i><small id="cover" class="form-text text-muted mt-0">**Ukuran file cover Maks. 10 MB;.</small></i> <br>
                      <input type="submit" class="btn btn-primary btn-sm" value="Upload">
                    </form>
                    @elseif($row->status == 'Terkirim')
                    @endif
                    </td>
                    <td align="center" style='text-align:center;vertical-align:middle'>
                    @if ($row->status == "Terkirim")
                    <h5>Barang Anda Berhasil Terkirim <br></h5>
                    <small><i>Jika Barang Anda Sudah Sampai</i></small><br>
                    <small><i>Klik Tombol <strong>"Menerima Barang"</strong>  Untuk Konfirmasi</i></small>
                    @elseif($row->status == "Tidak terkirim")
                    <h5>Barang Anda Tidak Terikirim</h5>
                     <small><i>Silahkan <strong>Upload Lagi Bukti Pembyaran</strong>  anda Untuk Membantu Verivikasi</i></small>
                    @elseif($row->status == "Di Proses")
                    <h5>Barang Anda Sedang Di Proses</h5>
                    <small><i>Silahkan <strong>Upload Bukti Pembyaran</strong>  anda Untuk Mempercepat Proses Pengiriman</i></small>
                    @elseif($row->status == 'Diterima')
                    <br>
                    <h6>Terima Kasih Telah Berbelanja Di Online Shop Kami, <br>
                       <strong>"Silahkan Belanja Lagi !"</strong></h3><br>
                    @endif
                    @empty
                    <h5>Belum ada Pesanan Barang</h5><h5>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
