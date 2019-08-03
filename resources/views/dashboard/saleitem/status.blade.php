@extends('templates.admin')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form class="form-horizontal" method="POST" action='{{url("/dashboard/statusadmin/$sale->id/update")}}'>
          @csrf
          @method('POST')
          <div class="card-body">
            <h4 class="card-title pb-3" align='center'>Status Pengiriman</h4>
            <div class="form-group row">
              <label for="fstatus" class="col-sm-3 text-right control-label col-form-label">
                Check Status
              </label>
              <div class="col-sm-6">
                <select name="status" id="status" class="form-control">
                  <option value="Terkirim" >Kirim</option>
                  <option value="Tidak terkirim" >Tidak Terkirim</option>
                </select>
              </div>
            </div>
          </div>
          <div class="border-top" align='center'>
            <div class="card-body">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{url('dashboard/categorie')}}" class="btn btn-success">Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@stop