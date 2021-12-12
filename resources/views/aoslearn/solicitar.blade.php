@extends('layouts.master')
@section('content')
<h2>{{ __('Solicitar la subida de un video')}}</h2>
<form action="{{ route('solicitud.store') }}" method="post">
    {{ method_field('POST') }}
    {{ csrf_field() }}
  <div class="form-group">
    <label for="titulo">{{ __('Titulo del video')}}</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Introduce un titulo')}}" maxlength="31">
    <small id="embedVideo" class="form-text text-muted">{{ __('Maximo de caracteres: 31 (cuentan espacios)')}}</small>
    @if($errors->has('title'))
      <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="vid">{{ __('Enlace de video embed')}}</label>
    <input type="text" class="form-control" id="video" name="video" placeholder="{{ __('Introduce el enlace del video')}}">
    @if($errors->has('video'))
      <span class="text-danger">{{ $errors->first('video') }}</span>
    @endif
    <a href="https://support.google.com/youtube/answer/171780?hl=es-419" target="_blank"><small id="embedVideo" class="form-text text-muted">{{ __('¿Como obtener el enlace embed?')}}</small></a>
  </div>
  <div class="form-group">
    <label for="aut">Autor del video</label>
    <input type="text" class="form-control" id="autor" name="autor" placeholder="{{ __('Introduce el nombre del autor del video')}}">
    @if($errors->has('autor'))
      <span class="text-danger">{{ $errors->first('autor') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="cat">{{ __('Categoria')}}</label>
    <select id="categorias" name="categorias">
    @foreach( $categorias as $categoria )
      <option value="{{$categoria->id_categoria}}" active>{{$categoria->nombre_categoria}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">{{ __('Enviar')}}</button>
</form>
@stop
