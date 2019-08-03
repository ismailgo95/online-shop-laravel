@extends('templates.admin')
@section('title', 'Dashboard')

@section('content')
<section id="product" class="pb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 align='center'>Detail Penjualan</h3>
            <br>
            <div class="row">
              <div class="col-md-11">
                <h4>Alamat Kirim</h4>
                  <li>Nama : <strong>{{$sales->nama}}</strong></li> 
                  <li>Email : <strong>{{$sales->email}}</strong></li> 
                  <li>Phone : <strong>{{$sales->phone}}</strong></li> 
                  <li>Alamat : <strong>{{$sales->alamat}}</strong></li> 
              </div>
              <div class="col-md-1">
                <br><br><br><br>
                  <a href="{{url('dashboard/saleitem',$sales->id)}}/cetak" class="btn btn-primary form-control"><i class="fas fa-print" alt="Print"></i></a>
              </div>
            </div>

            <div class="table-responsive pt-2">
              <table id="table-product" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>Kode</th>
                    <th>Nama Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php $total = 0; @endphp
                  @foreach ($sales->saleitem as $item)
                  <tr align="center">
                    <td>{{$item->product->code}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>Rp.{{number_format($item->price)}},-</td>
                    <td>
                      @php 
                        $total = $item->qty * $item->price;
                        $totalAll = !isset($totalAll) ? $totalAll = $total : $total + $totalAll ;
                      @endphp
                      Rp.{{number_format($total,0)}},-
                    </td>
                  </tr>
                   @endforeach
                  <tr>
                    <td colspan="4" align="right"><strong>Total</<strong></strong></h6></td>
                    <td align="center">Rp.{{number_format($totalAll,0)}},-</td>
                  </tr>
                  
              </table>
              {{-- Pemanggilan Paginate dibuat 3 data --}}
              <div class="paging">
                {{-- {{$products->links()}} --}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop