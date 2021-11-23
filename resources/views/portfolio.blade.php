@extends('adminlte::page')

@section('title', 'Painel - Site')

@section('content_header')
    <h1></h1>
@stop

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger d-flex justify-content-center p-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h4>Portifólio</h4>
                </div>
                <div class="card-body">  
                    <form method="post" action="{{route('cadastrar-portfolio')}} "enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="imagem">
                        </div>
                        <div class="form-group">
                            <label>Nome do projeto</label>
                            <input type="text" name="titulo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descrição do projeto</label>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link do Projeto</label>
                            <input type="text" name="link" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-info">Cadastrar</button>
                        </div>
                    </form>
                        <hr>



                    <table class="table table-bordered table">
                        <thead>
                            <tr style="font-size:22px;">
                                <th scope="col">Imagem</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Link</th>
                                <th scope="col">Acão</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($site_portfolios as $portfolio)
                            <tr>
                            <td><img width="200" height="150" src="{{asset($portfolio->imagem)}}"></td>
                            <td style="font-size:20px; font-weight:bold;">{{$portfolio->titulo}}</td>
                            <td>{{$portfolio->descricao}}</td>
                            <td>{{$portfolio->link}}</td>
                            <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalCenter{{$portfolio->id}}">Editar</button>

                                    <!-- INICIO MODAL EDITAR -->
                                    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                          </div>
                                          
                                          <form method="post">
                                              <div class="modal-body">
                                                
                                              </div>
                                              
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Voltar</button>
                                                <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                                              </div>
                                          </form>
                                          
                                        </div>
                                      </div>
                                      
                                    </div><!-- FIM MODAL EDITAR -->

                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>

                                    <!-- INICIO MODAL EXCLUIR -->
                                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                          </div>
                                          <form method="post">
                                              <div class="modal-body">
                                                <h5>Deseja realmente excluir o registro ?</h5>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Voltar</button>
                                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                              </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div><!-- FIM MODAL EXCLUIR -->

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop