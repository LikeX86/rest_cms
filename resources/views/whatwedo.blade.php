@extends('adminlte::page')

@section('title', 'Painel - O que fazemos')

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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Secão tipos de template</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('cadastrar-servico')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="imagem">
                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            <textarea type="text" name="titulo" class="form-control" id="editor"> </textarea>
                            
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-info">Adicionar</button>
                        </div>
                    </form>
                    <hr>

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Imagem</th>
                          <th scope="col">Titulo</th>
                          <th class="thflex" scope="col">Açôes</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        @foreach($site_servicos  as $servico)
                        <tr>
                          <td class="td-image"><embed autostart="true" width="380" height="300" src="{{asset($servico->imagem)}}"></td>
                          <td style="font-size:20px; font-weight:bold;">{{$servico->titulo}}</td>
                          <td> </td>
                          </table>

                    <!-- Button trigger modal -->
                   <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$servico->id}}">Adicionar itens</button>



                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$servico->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar</h5>
                                      </div>
                                      <form method="post" action="{{route('cadastrar-itens')}}">
                                        <input type="hidden" name="idServico" value="{{$servico->id}}">
                                        @csrf
                                          <div class="modal-body">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <input class="form-control" type="text" name="descricao">
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <form class="d-inline" method="post" action="{{route('delete-servico')}}" onsubmit="return confirm('Deseja realmente excluir o registro ?')">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$servico->id}}">
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                                
                          <table style="max-height: 50px; ">
                                <thead>
                                    <tr>
                                        <th>Lista de itens</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($servico->itens()->get() as $item)
                                    <tr>
                                    <td><?php echo wordwrap($item->descricao,65,"<br />\n");?></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                          </table>
                          <hr style="background-color:aqua;">
                        </tr>
                        @endforeach
                      </tbody>
                </div>
            </div>
        </div>
    </div>
@stop