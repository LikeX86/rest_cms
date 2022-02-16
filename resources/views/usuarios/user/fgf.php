<!DOCTYPE html>
<html lang="pt-BR">

<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="DJ4Pwi4FbS5oApx7DLTwHe8G4ht7zoQ6ZF38itue">

    
    
    
    <title>
                Dashboard            </title>

    
    
    
            <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">

        
        
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    
    
    
            
    
    
</head>

<body class="layout-fixed layout-navbar-fixed sidebar-mini" >

    
        <div class="wrapper">

        
                    <nav class="main-header navbar
    navbar-expand
    navbar-white navbar-light">

    
    <ul class="navbar-nav">
        
        <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"
                        >
        <i class="fas fa-bars"></i>
        <span class="sr-only">Trocar navegação</span>
    </a>
</li>
        
        
        
            </ul>

    
    <ul class="navbar-nav ml-auto">
        
        
        
        
        
                                    <li class="nav-item dropdown user-menu">

    
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span >
                {{ Auth::user()->name}}
        </span>
    </a>

    
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        
                            
        
        
        
        
        
        <li class="user-footer">
                            <a href="http://127.0.0.1:8000/painel/perfil" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user text-lightblue"></i>
                    Perfil
                </a>
                        <a class="btn btn-default btn-flat float-right "
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i>
                Sair
            </a>
            <form id="logout-form" action="http://127.0.0.1:8000/painel/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="DJ4Pwi4FbS5oApx7DLTwHe8G4ht7zoQ6ZF38itue">
            </form>
        </li>

    </ul>

</li>
                    
        
            </ul>

</nav>
        
        
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">

    
            <a href="http://127.0.0.1:8000/painel/admin"
            class="brand-link ">
  
    <img src="{{asset(Auth::user()->avatar)}}"
         alt=" "
         class="img-circle "
         style="width:75px; height:75px;">
    
    <span class="brand-text font-weight-light ">
        <b>Agência</b> NineNine
    </span>

</a>
    
    
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column "
                data-widget="treeview" role="menu"
                                >
                
                <li  class="nav-header text-md font-weight-bold">

    Administração

</li>

<li  class="nav-item">

    <a class="nav-link active "
       href="http://127.0.0.1:8000/painel/admin"        >

        <i class="text-lg fas fa-home "></i>

        <p>
            Home

                            <span class="badge badge-success right">
                    4
                </span>
                    </p>

    </a>

</li>

<li  class="nav-item has-treeview ">

    
    <a class="nav-link text-md "
       href="" >

        <i class="fas fa-fw fa-share "></i>

        <p>
            Menu
            <i class="fas fa-angle-left right"></i>

                    </p>

    </a>

    
    <ul class="nav nav-treeview">
        <li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/site"        >

        <i class="fas fa-book text-info"></i>

        <p>
            Site

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/whatwedo"        >

        <i class="fas fa-pencil-alt "></i>

        <p>
            O que fazemos

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/portfolio"        >

        <i class="fas fa-globe text-primary"></i>

        <p>
            Portfolio

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/sobre"        >

        <i class="fas fa-circle-notch text-success"></i>

        <p>
            Sobre

                    </p>

    </a>

</li>

    </ul>

</li>

<li  class="nav-header text-md font-weight-bold">

    Gerenciamento de posts

</li>

<li  class="nav-item has-treeview ">

    
    <a class="nav-link  "
       href="" >

        <i class="fas fa-fw fa-user text-primary"></i>

        <p>
            Posts
            <i class="fas fa-angle-left right"></i>

                    </p>

    </a>

    
    <ul class="nav nav-treeview">
        <li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/post"        >

        <i class="fas fa-blog text-white"></i>

        <p>
            Postagem

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/upload-arquivos"        >

        <i class="fas fa-upload text-primary"></i>

        <p>
            Upload Arquivos

                    </p>

    </a>

</li>

    </ul>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/config"        >

        <i class="fas fa-users text-secondary"></i>

        <p>
            Config

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/categorias"        >

        <i class="fas fa-stream text-white"></i>

        <p>
            Categorias

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/tags"        >

        <i class="fas fa-tags text-warning"></i>

        <p>
            Tags

                    </p>

    </a>

</li>

<li  class="nav-header text-md font-weight-bold">

    Gerenciamento de Usuarios

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/usuariosdb"        >

        <i class="fas fa-users text-primary"></i>

        <p>
            Usuarios

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/criar-usuario"        >

        <i class="fas fa-user-plus text-success"></i>

        <p>
            Criar-Usuario

                    </p>

    </a>

</li>

<li  class="nav-header text-md font-weight-bold">

    Configurações da Conta

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/configuracoes"        >

        <i class="fas fa-fw fa-user text-primary"></i>

        <p>
            Perfil

                    </p>

    </a>

</li>

<li  class="nav-item">

    <a class="nav-link  "
       href="http://127.0.0.1:8000/painel/password"        >

        <i class="fas fa-fw fa-lock text-info"></i>

        <p>
            Mudar Senha

                    </p>

    </a>

</li>

            </ul>
        </nav>
    </div>

</aside>
        
        
                    <div class="content-wrapper ">

    
            <div class="content-header">
            <div class="container-fluid">
                    <h1>Dashboard</h1>
            </div>
        </div>
       
    </div>

    
            <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        
        
        <script src="http://127.0.0.1:8000/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
    
    
    
            
</body>

</html>