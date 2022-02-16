<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Hind:300,500,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  -->

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    

        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link rel="icon" href="{{asset('imagens/logo.png')}}" type="image/x-icon">


        @foreach($config_geral as $config)
        <title>{{$config->name}}<</title>
        @endforeach

</head>
 
  

<body>
   
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
            <script>
                $(function(){
                    $(".button-collapse").sideNav();
                });
                </script>
        <div onclick="scrollTopo()" class="scrollButton">
                <i class="fas fa-angle-double-up"></i>
            </div><!--botão de scroll-->

            <header>
<!-- Navigation -->
<nav class="navbar navbar-expand-xl navbar-dark  fixed-top">
  <div class="container">
  @foreach($config_geral as $config)
    <a class="navbar-brand" href="#"> 
     <strong>{{$config->name}}</strong>
    </a>
    @endforeach
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#servicos">Serviços</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#portfolio">Portfólio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contato">Contato</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</header>

<section>
        @foreach($site_banner as $banner)
        <div class="banner">
            <div class="bannertext">
            <span> <?php echo wordwrap($banner->texto_subt,85,"<br />\n");?></span>
                <h1> <?php echo wordwrap($banner->texto_titulo,85,"<br />\n");?></h1> 
                <p> <?php echo wordwrap($banner->texto_banner,100,"<br />");?></p>
            </div>
            @if(!$banner->url_show == null)
            <embed autostart="true" style="padding:20px 20px; width:700px; height:500px" src={{asset($banner->url_show)}} class="castle" alt="...">        

            @else 
            <embed autostart="true" style="padding-top:20px; width:700px; height:500px" src={{asset($banner->imagem)}} class="castle" alt="...">        
        </div>
        @endif
        @endforeach
        
    </section>

    <!-- -->

    <section id="servicos">
    <!-- $site_servicos as $servicos pq aqui não é mais banner-->
        <div class="titulos">
            <span>Algumas das nossas alternativas</span>
            <h2>TIPOS DE TEMPLATES</h2>
            </div>
            @foreach($site_servicos as $servico)
            <div id="product">

                <article class="product-card">
                    <embed style="padding-top:20px;"height="500" width="100%" src={{asset($servico->imagem)}} alt=""/>
                    <div class="product-textos">

                    <h3> {{$servico->titulo}} </h3>
                    @foreach($servico->itens()->get() as $item)
                    <p><?php echo wordwrap($item->descricao,60,"<br>\n");?></p>
                    @endforeach
                    <button class="services-button">Ver planos</button>                    
                    </div>
                </article>
            </div>
        </section>
        @endforeach
        <section>
            <div class="titulos">
                <span>Tudo tem um começo, meio e fim</span>
                <h2>Etapas de Desenvolvimento</h2>
            </div>
            <div id="etapas">
                <div class="etapas-card">
                    <svg class="svg-color"  xmlns="http://www.w3.org/2000/svg" width="80" height="80"class="bi bi-diagram-3" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                      <h4>Você entra em contato</h4>
                      <p>Nos fale um pouco sobre sua ideia para a<br> plataforma que pretende desenvolver.</p>
                </div>
                <div class="etapas-card">
                    <svg class="svg-color"  xmlns="http://www.w3.org/2000/svg" width="80" height="80"class="bi bi-diagram-3" viewBox="0 0 16 16">
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                    </svg>
                      <h4>Proposta</h4>
                      <p>Após nosso papo, elaboramos uma<br> proposta que melhor se encaixa para você.</p>
                </div>
                <div class="etapas-card">
                    <svg class="svg-color"  xmlns="http://www.w3.org/2000/svg" width="80" height="80"class="bi bi-diagram-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                    </svg>
                      <h4>Construimos seu Site</h4>
                      <p>Com contrato fechado, desenvolvemos seu<br> site no prazo pre definido e publicamos na<br> web.</p>
                </div>
            </div>
        </section>
        <section id="lead-banner">
            <div class="item-card">
                <h3>Orçamento sem compromissos</h3>
            </div>
            <div class="item-card">
                <a class="solicitar" href="https://api.whatsapp.com/send?phone=5575983642055&text=hjjhjh."
                    target="_blank" title="Fale Conosco" class="solicitar">Solicitar</a>
            </div>    
        </section>
        <section id="portfolio">
            <div class="titulos">
                <span>Alguns dos nossos principais projetos</span>
                <h2>Portfólio</h2>
            </div>
            @foreach($site_portfolios as $portfolio)
            <div class="projetos">
                <div class="projetos-card">
                    <div class="projetos-img">
                    @if(!$portfolio->url_show == null)
                        <embed autostart="true" src="{{asset($portfolio->url_show)}}" height="280px;" width="500px">        

                        @else 
                        <embed autostart="true" src="{{asset($portfolio->imagem)}}" height="280px;" width="500 px">        
                    </div>
                    @endif 
                    
                    <h4>{{$portfolio->titulo}}</h4>
                    <p class="mb-4"><?php echo wordwrap($portfolio->descricao,60,"<br />\n");?></p>
                    <a href="{{$portfolio->link}}" target="_blank" title="Visite" class="solicitar">Visitar</a>
                </div>
            @endforeach

            </div>
        </section>



<section class="content">
<div class="row">
@foreach($posts as $post)
<div class="col-md-6">
        <div class="card card-widget">  
            <div class="card-header">  
            <div class="user-block">
            <img class="img-circle" src="{{Auth::user() !== null ? asset($user->avatar) : asset('avatar.png')}}" alt="User Image">
            <span class="username">{{Auth::user()->name ?? 'none'}}</span>
            <span class="description">{{$post->data}}</span>
            </div>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" title="Mark as read">
            <i class="far fa-circle"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i></button>
            </div>

            </div>
            <div class="card-body">
                <div class="form-group">
                    <h4>{{$post->titulo}}</h4>
                    <span>{{$post->subtitulo}}</span>
                </div>
            <img width="500px" class="img-fluid pad" src="{{$post->imagem}}" alt="Photo">
            <p>{{$post->descricao}}</p>
            <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
            <span class="float-right text-muted">127 likes - 3 comments</span>
            </div>

            <div class="card-footer card-comments">
            <div class="card-comment">
            <div class="comment-text">
            <span class="username">
            Maria Gonzales
            <span class="text-muted float-right">8:03 PM Today</span>
            </span>
            It is a long established fact that a reader will be distracted
            by the readable content of a page when looking at its layout.
            </div>
            </div>

            <div class="card-footer">
            <form action="#" method="post">
            <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" >

            <div class="img-push">
            <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
            </div>
        </form>

        </div>
</div>
</div>
</div>
@endforeach
</div>
</div>

</section>

        @foreach($site_sobre as $sobre)
        <div id="sobre" class="titulo-sobre">
            <h1>{{$sobre->titulo_sobre}}</h1>
            <div style="font-size:20px; padding:auto 25px; font-weight: bold;" ><?php echo wordwrap($sobre->texto_sobre);?></div>
            </div>  
            @endforeach       
        <section id="contato">
            <div class="titulos">
                <span>Está com alguma duvida ?</span>
                <h2>Entre em contato</h2>
            </div>
            <div id="form">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nome" placeholder="Nome" minlength="3" maxlength="30" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" minlength="11" maxlength="14" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" minlength="8" maxlength="120" required>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="mensagem" placeholder="Mensagem" minlength="10" maxlength="255" autocomplete="off" required rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="solicitas" name="send"  value="Enviar">
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="container">
            @foreach($config_geral as $config)
                <h2>{{$config->name}}</h2>
                <p>{{$config->name}} &copy <span id="ano"></span> - Todos os direitos reservados.</p>
            @endforeach
            </div>
        </footer>
        <script src={{asset("js/script.js")}}></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</body>
</html>