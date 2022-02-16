@extends('paginas.admin')

@section('title', 'Sobre - Sobre')

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
                    <h4>Seção sobre</h4>
                </div>
                <div class="card-body">
                @foreach($site_sobre as $sobre)         
                    <form method="post" action="{{route('editar-sobre', $sobre->id)}}" enctype="multipart/form-data">
                    @method('put')    
                    @csrf
                        <div class="form-group">
                            <label>Titulo</label>
                            <textarea type="text" name="titulo" class="form-control" > </textarea>
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea type="text" name="texto" class="form-control"> </textarea>    
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-info">Adicionar</button>
                        </div>
                    </form>
                    @endforeach
                    <hr>
                    <table class="table table-bordered table">

                        <tbody>
                            @foreach($site_sobre as $sobre)
                            <tr>
                            <div id="sobre" class="titulo-sobre">
                            <h1>{{$sobre->titulo_sobre}}</h1>
                            <div style="font-size:20px; padding:auto 25px; font-weight: bold;" ><?php echo wordwrap($sobre->texto_sobre);?></div>
                            </div>   

                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop