@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1></h1>

@stop

@section('content')
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href=" ">Recentemente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#pendente">Antigos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#desativado">Desativados</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Registro de visitas no ultimos 30 dias.</h5>
    <p class="card-text">API GOOGLE DATABASE</p>
    <a href="#" class="btn btn-primary">Mais detalhes</a>
  </div>
</div>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href=" ">Online</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#pendente">Todos</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Registro navegação dos administradores</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-primary">Mais detalhes</a>
  </div>
</div>


<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title font-weight-bold">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card-group ">
  <div class="card text-white bg-dark m-1">
    <div class="card-body">
      <h5 class="card-title text-primary font-weight-bold">Modificar imagem do banner </h5>
      <p class="card-text">A imagem do banner deve ter uma paleta de cores já estabelicida anteriormente e deve conter animação sendo assim um gif ou video.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card text-white bg-secondary m-1 ">
    <div class="card-body">
      <h5 class="card-title text-primary font-weight-bold">Card title</h5>
      <p class="card-text ">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card text-white bg-secondary m-1">
    <div class="card-body">
      <h5 class="card-title text-primary font-weight-bold">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
@stop

