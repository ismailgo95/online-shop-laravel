@extends('templates.admin')

@section('title', 'Dashboard')

@section('content')
<section class="">
  <div class="container-fluid pb-4">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="{{url('dashboard/categorie/create')}}">
              <button class="btn btn-primary">Tambah Categorie</button>
            </a><br><br>
            @if( Session::has("success"))
              <div class="alert alert-success">
                  {{Session::get('success')}}
              </div>
            @endif

            @if( Session::has("error"))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="table-responsive">
              <table id="list_categories" class="table table-striped table-bordered">
                <thead>
                  <tr>

                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ( $list_categories as $categorie )
                    <td>{{$categorie->name}}</td>
                    <td>{{$categorie->status}}</td>
                    <td>
                      <form action='{{url("dashboard/categorie/$categorie->id")}}' method="POST" style='display:inline-block'>
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger" onClick="return confirm('yakin ?')"><i class="fas fa-trash"></i></button>
                      </form>
                      &nbsp
                      <a href="{{url('dashboard/categorie',$categorie->id)}}/edit">
                        <button class="inline-block btn btn-warning"><i class="fas fa-edit"></i></button>
                      </a>
                    </td>
                  </tr>
                  @endforeach
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