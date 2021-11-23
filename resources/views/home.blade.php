<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Hind:300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  -->

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--  -->
    
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('imagens/logo.png')}}" type="image/x-icon">
    <title>NINE-NINE</title>
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
        <nav>
        <div class="container">
            <div class="menu">
                <div class="logo">
                <a href="#">NINE-NINE</a>
                        <a href="#" data-activates="menu-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                    </div>
                    <ul class="menu_pc right hide-on-med-and-down">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Portfólio</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                    <ul class="side-nav" id="menu-mobile">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Portfólio</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                </div>
            </nav>
</header>

<section>
        @foreach($site_banner as $banner)
        <div class="banner">
            <div class="bannertext">
                <span> Criação de Sites na Bahia</span>
                <h1>NINE-NINE</h1>  
                <p>{{$banner->texto_banner}}</p>
                <a href="#" class="waves-effect waves-purple btn">Orçamento</a>
            </div>
            <img src={{$banner->imagem}} class="castle" alt="...">        
        </div>
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
                    <img height="100%" width="100%" src={{asset($servico->imagem)}} alt=""/>
                    <div class="product-textos">

                    <h3> {{$servico->titulo}} </h3>
                    @foreach($servico->itens()->get() as $item)
                    <p> {{$item->descricao}} </p>
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
        <section id="portfolio ">
            
            <div class="titulos">
                <span>Alguns dos nossos principais projetos</span>
                <h2>Portfólio</h2>
            </div>
            @foreach($site_portfolios as $portfolio)
            <div class="projetos">
                <div class="projetos-card">
                    <div class="projetos-img"> 
                        <img src="{{asset($portfolio->imagem)}}" width="500px"/>
                    </div>
                    <h4>{{$portfolio->titulo}}</h4>
                    <p class="mb-4">{{$portfolio->descricao}}</p>
                    <a href="{{$portfolio->link}}" target="_blank" title="Visite" class="solicitar">Visitar</a>
                </div>
            @endforeach

            </div>
        </section>
        <div class="titulo-sobre">
            <h1>Sobre-Nós</h1>
            <p>Sou um parágrafo. Clique aqui para editar e adicionar o seu<br>próprio texto. É fácil! Basta clicar em “Editar Texto” ou clicar<br>
                duas vezes sobre mim e você poderá adicionar o seu próprio<br>conteúdo e trocar fontes. Sou um ótimo espaço para você<br>
                contar sua história.</p>
            <h2>Nossa equipe de desenvolvimento</h2>
            </div>        
        <section class="sobre">
            <div class="wrap">    
                 <div class="card">
                    <div class="card-liner">
                <figure><img
                src={{asset("imagens/logo.png")}}
                        alt="" /> </figure>
                <div class="card--social">
                    <ul>
                        <li class="instagram"><a target="_blank" href="https://www.instagram.com/_pedro_xzz/" class="insta"><i class="bi bi-instagram"></i></i></a></li>
                        <li class="codepen"><a href="#"><i class="fa fa-codepen"></i></a></li>
                    </ul>
                </div>
                <div class="card--title">
                    <h3>Pedro Ramos</h3>
                    <p>Web Developer</p>
                </div>
                <div class="card--desc">
                    <hr />
                    <p>“Todos deveriam aprender a programar um computador, porque ele ensina como pensar.”</p>
                </div>
                <div class="card--btn">
                    <a href="0">
                        <span class="moreinfo"><i class="fa fa-info-circle"></i> ALGO QUE QUE QUEIRA</span>
                        <span class="fullprof">Não se esqueça de deixar o like<i class="fa fa-heart"></i> </span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="wrap">
        
        <div class="card">
            <div class="card-liner">
                <figure><img
                src={{asset("imagens/logo.png")}}
                        alt="" /> </figure>
                <div class="card--social">
                    <ul>
                        <li class="instagram"><a target="_blank" href="https://www.instagram.com/_pedro_xzz/" class="insta"><i
                            class="bi bi-instagram"></i></i></a></li>
                        <li class="codepen"><a href="#"><i class="fa fa-codepen"></i></a></li>
                    </ul>
                </div>
                <div class="card--title">
                    <h3>Julia Assunção</h3>
                    <p>Web Designer</p>
                </div>
                <div class="card--desc">
                    <hr />
                    <p>“Todos deveriam aprender a programar um computador, porque ele ensina como pensar.”</p>
                </div>
                <div class="card--btn">
                    <a href="0">
                        <span class="moreinfo"><i class="fa fa-info-circle"></i> ALGO QUE QUE QUEIRA</span>
                        <span class="fullprof">Não se esqueça de deixar o like<i class="fa fa-heart"></i> </span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="wrap">
        
        <div class="card">
            <div class="card-liner">
                <figure><img
                src={{asset("imagens/logo.png")}}
                        alt="" /> </figure>
                <div class="card--social">
                    <ul>
                        <li class="instagram"><a target="_blank" href="https://www.instagram.com/_pedro_xzz/" class="insta"><i
                                    class="bi bi-instagram"></i></i></a></li>
                        <li class="codepen"><a href="#"><i class="fa fa-codepen"></i></a></li>
                    </ul>
                </div>
                <div class="card--title">
                    <h3>Wendel Ferreira</h3>
                    <p>Web Developer</p>
                </div>
                <div class="card--desc">
                    <hr />
                    <p>“Todos deveriam aprender a programar um computador, porque ele ensina como pensar.”</p>
                </div>
                <div class="card--btn">
                    <a href="0">
                        <span class="moreinfo"><i class="fa fa-info-circle"></i> ALGO QUE QUE QUEIRA</span>
                        <span class="fullprof">Não se esqueça de deixar o like<i class="fa fa-heart"></i> </span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        </section>
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
                        <textarea class="form-control" name="mensagem" placeholder="Mensagem" minlength="10" maxlength="255" autocomplete="off" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="solicitas" name="send"  value="Enviar">
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="container">
                <h2>NINE-NINE</h2>
                <p>NINE-NINE &copy <span id="ano"></span> - Todos os direitos reservados.</p>
            </div>
        </footer>
        <script src={{asset("js/script.js")}}></script>
</body>
</html>