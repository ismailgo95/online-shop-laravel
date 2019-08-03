@section('title', 'Dashboard')

@extends('templates.admin')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
      
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
                              <table id="list_templates" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Folder</th>
                                          <th>selected</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
      
                                      @foreach ( $template as $template )
                                      <tr>
                                          <td>{{$template->name}}</td>
                                          <td>{{$template->folder}}</td>
                                          <td>@if ( $template->selected == 1) <b>selected</b> @else - @endif</td>
                                          <td>
                                              <a href='{{url("dashboard/template/$template->id/select")}}'>
                                                  <button class="btn btn-success">select</button>
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
@endsection