@section('title', 'Dashboard')

@extends('templates.admin')
@section('content')
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form class="form-horizontal" method="POST" action="{{url('dashboard/categorie')}}">
          @csrf
          <div class="card-body">
            <h4 class="card-title pb-3" align='center'>Form Categorie</h4>
            <div class="form-group row">
              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Categories Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control @error('name') error @enderror" id="name" name="name" placeholder="Masukan Kategori ">
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