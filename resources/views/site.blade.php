@extends('adminlte::page')

@section('title', 'Painel - Site')

@section('content_header')
    <h1></h1>
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
                       
                      <div class="align-items-center" >
                      <section>
                            <div class="banner">
                                <div class="bannertext">
                                    <span> Criação de Sites na Bahia</span>
                                    <h1>NINE-NINE</h1>  
                                    <p>{{$banner->texto_banner}}</p>
                                    <a href="#" class="waves-effect waves-purple button">Orçamento</a>
                                </div>
                        <img width="280px" height="210px" src={{asset($banner->imagem)}}>

                            </div>
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
                            <label>Texto da seção</label>
                            <textarea name="texto-banner" class="form-control" rows="3">
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
@stop