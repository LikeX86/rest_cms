@extends('adminlte::page')

@section('title', 'Painel - Usuarios')

@section('content_header')

    <link href="{{asset('css/styleadmin.css')}}" rel="stylesheet">

@stop

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger d-flex justify-content-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Users
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <a onclick="return confirm('Você quer mesmo deleta-lo da tabela ?')" class="btn btn-danger btn-sm"  href="{{url('/painel/usuariosdb/delete/'.$user->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@stop