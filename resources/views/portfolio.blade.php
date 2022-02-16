@extends('paginas.admin')

@section('title', 'Painel - Portfolio')

@section('content_header')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="{{asset('css/styleadmin.css')}}" rel="stylesheet">

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
                        <label for="exampleInputFile">Url para upload</label>
                          <textarea rows="1" id="link" class="form-control" type="text" name="url_show"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nome do projeto</label>
                            <input type="text" name="titulo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descrição do projeto</label>
                            <textarea id="editor" type="text" name="descricao" class="form-control" placeholder="Colocar nova descrição"></textarea>
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
                            <td>  
                            @if(!$portfolio->url_show == null)
                                <embed autostart="true" src="{{asset($portfolio->url_show)}}" height="150px;" width="200px">        
                                @else 
                                <embed autostart="true" src="{{asset($portfolio->imagem)}}" height="150px;" width="200px">        
                                </div>
                                @endif 
                            </td>
                            <td style="font-size:20px; font-weight:bold;">{{$portfolio->titulo}}</td>
                            <td><?php echo wordwrap($portfolio->descricao,40,"<br />\n");?></td>
                            <td>{{$portfolio->link}}</td>
                            <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEditar">Editar</button>
           





                                    <!-- INICIO MODAL EDITAR -->
                                    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                          </div>
                                              <form  method="post" action="{{route('editar-portfolio', $portfolio->id)}}" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                <div class="modal-body">
                                                <div class="form-group">
                                                <label for="exampleInputFile">Alterar Imagem</label>
                                                <div class="input-group">
                                                <input class="image p-2 mb-3  rounded bg-dark text-white" type="file" name="imagem">
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <div class="titulo">
                                                    <label>Titulo atual do projeto</label>
                                                    </div>
                                                    <h4>{{$portfolio->titulo}}</h4>
                                                    <div class="sessoes">
                                                    <input type="text" name="titulo" class="form-control" placeholder="Colocar novo titulo">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="titulo">
                                                <label>Descrição do projeto</label>
                                                </div>
                                                <h4 style="background-color:#a3b6b9; font-size:20px;color:black;">{{$portfolio->descricao}}</h4>
                                                    <div class="sessoes">
                                                    <textarea id="editor" type="text" name="descricao" class="form-control" placeholder="Colocar nova descrição"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="titulo">
                                                <label>Links do projeto</label>
                                                </div>
                                                <h4>{{$portfolio->link}}</h4>
                                                    <div class="sessoes">
                                                    <input type="text" name="link" class="form-control" placeholder="Colocar novo link">
                                                    </div>
                                                </div>
                                                </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Voltar</button>
                                                <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                                              </div>
                                          
                                        </div>
                                      </form>
                                      </div>
                                    </div><!-- FIM MODAL EDITAR -->
                                    <form class="d-inline" method="post" action="{{route('delete-portfolio')}}" onsubmit="return confirm('Deseja realmente excluir o registro ? {{$portfolio->titulo}}')">
                                    @method('delete')
                                    @csrf                                             
                                    <input type="hidden" name="id" value="{{$portfolio->id}}">
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                                </form>           
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/1xru14napkj8v95y2qzh70c9j3ft6nt9nl965vrwq2d0z3pr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap',
    plugins: 'lists, link,',
    toolbar: 'h1 h2 bold | removeformat help',
    menubar: false,
  setup: (editor) => {
    // Apply the focus effect
    editor.on("init", () => {
      editor.getContainer().style.transition =
        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
    });
    editor.on("focus", () => {
      (editor.getContainer().style.boxShadow =
        "0 0 0 .2rem rgba(0, 123, 255, .25)"),
        (editor.getContainer().style.borderColor = "#80bdff");
    });
    editor.on("blur", () => {
      (editor.getContainer().style.boxShadow = ""),
        (editor.getContainer().style.borderColor = "");
    });
  },
});
</script>
@stop