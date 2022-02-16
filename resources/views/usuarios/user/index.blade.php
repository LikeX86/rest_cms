@extends('paginas.admin')
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
    <a href="{!! url('/painel/criar-usuario') !!}">+ Adicionar Usuário</a>

<div style="width:300px;" class="input-group pull-right">
  <input type="text" class="form-control" placeholder="Pesquisar...">
  <div class="input-group-btn">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="{!! url('/painel/listar-usuarios/desativados') !!}">Desativados</a></li>
    </ul>
  </div>
</div>
</div>

      <div class="table-responsive">
      <table class="table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Email</th>
            <th>Data Inscrição</th>
            <th>Ação</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{!! $user->id !!}</td>
            <td>{!! $user->name !!}</td>

            @if($user->level==0)<td>Leitor</td>@endif
            @if($user->level==1)<td>Revisor</td>@endif
            @if($user->level==2)<td>Admin</td>@endif

            <td>{!! $user->email !!}</td>
            <td>{!! $user->created_at->diffForHumans() !!}</td>
            <td>
              @if(!$user->deleted_at)
              <a onclick="return confirm('Você quer mesmo deleta-lo da tabela ?')" class="btn btn-danger btn-sm"  href="{!! url('/painel/deletar-usuario/'.$user->id) !!}">Delete</a>

              @endif
            </td>
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@stop