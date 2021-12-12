@extends('layouts.master')
@section('content')
<h2>{{ __('Añadir categoria')}}</h2>
<form action="{{ route('categoria.store') }}" method="post">
    {{ method_field('POST') }}
    {{ csrf_field() }}
  <div class="form-group">
    <label for="titulo">{{ __('Titulo del video')}}</label>
    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="{{ __('Introduce el nombre de la categoria')}}">
    @if($errors->has('nombre_categoria'))
      <span class="text-danger">{{ $errors->first('nombre_categoria') }}</span>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">{{ __('Añadir')}}</button>
</form>
@stop