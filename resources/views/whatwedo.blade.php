@extends('paginas.admin')

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
                        
           <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Tipos de template</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Colocar titulo">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Adicionar imagem</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="imagem" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Escolher arquivo - jpg,png,gif</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                @foreach($site_servicos  as $servico) 
                    <div class="card mb-3">
                    <img class="card-img-top" autostart="true" width="380" height="300" src="{{asset($servico->imagem)}}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{$servico->titulo}}</h5>
                      </div>

                    <div>
                        @foreach($servico->itens()->get() as $item)
                          <p><?php echo wordwrap($item->descricao,60,"<br>\n");?></p>
                        @endforeach
                    </div>  

                     
                  </div>           
                         
                </div>
                
                @endforeach
                        <form class="d-inline" method="post" action="{{route('delete-servico')}}" onsubmit="return confirm('Deseja realmente excluir o registro ?')">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$servico->id}}">
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                         </form>


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
                </div>
            </div>
        </div>
    </div>
@stop