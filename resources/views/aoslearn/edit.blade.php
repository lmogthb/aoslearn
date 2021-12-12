@extends('layouts.master')
@section('content')
<h2>Editar recurso</h2>
<form action="{{ route('recurso.update', $recurso->id ) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
  <div class="form-group">
    <label for="titulo">{{ __('Titulo del video')}}</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Introduce un titulo')}}" value="{{$recurso->title}}">
    @if($errors->has('title'))
      <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="vid">{{ __('Enlace de video embed')}}</label>
    <input type="text" class="form-control" id="video" name="video" value="{{$recurso->video}}" placeholder="{{ __('Introduce el enlace del video')}}">
    @if($errors->has('video'))
      <span class="text-danger">{{ $errors->first('video') }}</span>
    @endif
    <a href="https://support.google.com/youtube/answer/171780?hl=es-419"><small id="embedVideo" class="form-text text-muted">{{ __('¿Como obtener el enlace embed?')}}</small></a>
  </div>
  <div class="form-group">
    <label for="aut">Autor del video</label>
    <input type="text" class="form-control" id="autor" name="autor" value="{{$recurso->autor}}" placeholder="{{ __('Introduce el nombre del autor del video')}}">
    @if($errors->has('autor'))
      <span class="text-danger">{{ $errors->first('autor') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="cat">{{ __('Categoria')}}</label>
    <select id="categorias" name="categorias">
    @foreach( $categorias as $categoria )
    <?php if($categoria->nombre_categoria == $recurso->nombre_categoria) : ?>
        <option value="{{$categoria->id_categoria}}" selected>{{$categoria->nombre_categoria}}</option>
    <?php else:?>
        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
    <?php endif?>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">{{ __('Editar')}}</button>
</form>
@stop