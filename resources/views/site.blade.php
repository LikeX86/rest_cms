@extends('paginas.admin')

@section('title', 'Painel - Site')

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
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Seção Home</h4>
                </div>
                @foreach($site_banner as $banner)
                <form  method="post" action="{{route('editar-banner', $banner->id)}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    
                    <div class="card-body ">
                       
                      <div class="align-items-center preview" >
                      <section>
                            <div class="banner">
                                <div class="bannertext">
                                    <span> <?php echo wordwrap($banner->texto_subt,85,"<br />\n");?></span>
                                    <h1><?php echo wordwrap($banner->texto_titulo,85,"<br />\n");?></h1> 
                                    <p><?php echo wordwrap($banner->texto_banner,50,"<br />");?></p>
                                    <a href="#" class="waves-effect waves-purple btn button">Orçamento</a>
                                </div>
                                @if(!$banner->url_show == null)
                                <embed autostart="true" style="padding-top:20px; width:600px; height:450px" src={{asset($banner->url_show)}} class="castle" alt="...">        

                                @else 
                                <embed autostart="true" style="padding-top:20px; width:600px; height:400px" src={{asset($banner->imagem)}} class="castle" alt="...">        
                            </div>
                            @endif
                        </section>
                      </div>
                      <div class="form-group">
                        <h3>Situação do banner atual</h3>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Alterar Imagem</label>
                        <div class="input-group">
                          <input class="image p-2 mb-3  rounded bg-dark text-white" type="file" name="imagem">

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Alterar Imagem. (Inserir link)</label>
                          <input id="link" class="form-control" type="text" name="url_show">
                          {{$banner->url_show}}
                          </input>
                        </div>

                        <div class="form-group">
                        <label>Alterar Titulo</label>
                          <textarea width="300px" class="form-control" type="text" name="banner-titulo">
                          {{$banner->texto_titulo}}
                          </textarea>
                        </div>

                        <div class="form-group">
                        <label>Alterar subtitulo</label>
                          <textarea rows="2"  class="form-control" type="text" name="banner-subt">
                          {{$banner->texto_subt}}
                          </textarea>
                        </div>
                    
                    
                      <div class="form-group">
                            <label>Texto da seção</label>
                            <textarea id="editor" name="texto-banner" class="form-control">
                                {{$banner->texto_banner}}
                            </textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Editar</button>
                    </div>
                  </form>
                  @endforeach
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