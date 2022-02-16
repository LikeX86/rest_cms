@extends('paginas.admin')
@section('content')

<div class="row">
@foreach($posts as $post)

<div class="col-md-6">
<div class="card card-widget">  
<div class="card-header">  
<div class="user-block">
<img class="img-circle" src="{{Auth::user()->avatar}}" alt="User Image">
<span class="username">{{Auth::user()->name}}</span>
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

@stop
