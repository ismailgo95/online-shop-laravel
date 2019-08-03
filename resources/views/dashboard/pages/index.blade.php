@extends('templates.admin')

@section('title', 'Admin Pages')


@section('content')

<section id="product" class="pb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{url('/dashboard/pages/create')}}">
                            <button class="btn btn-primary">Tambah Pages</button>
                        </a>
                        <div class="table-responsive pt-4">
                            <table id="table-product" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ( $pages as $page)
                                        <td>{{ $page->judul }}</td>
                                        <td>
                                            <form action='{{url("dashboard/pages/$page->id")}}' method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger"
                                                    onClick="return confirm('yakin ?')">delete</button>
                                                <a href='{{url("dashboard/pages/$page->id/edit")}}'
                                                    class="btn btn-primary">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
