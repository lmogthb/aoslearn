@extends('layouts.master')
@section('content')
<div class="text-left">
    <a class="btn btn-success" role="button" href="{{ route('admin.index') }}">{{ __('Mostrar solicitudes actuales')}}</a>
    <a class="btn btn-info" role="button" href="{{ route('categoria.create') }}">{{ __('Añadir nueva categoria')}}</a>
</div>
<br>
<h2>{{ __('Recursos actuales')}}</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Video</th>
            <th scope="col">Autor</th>
            <th scope="col">{{ __('Categoria')}}</th>
            <th scope="col">{{ __('Acciones')}}</th>
        </tr>
    </thead>
    <tbody>
    <!-- Para cada producto recogido de una funcion hecha en controladorProducto.php
    hacemos una fila, mostrando todos los datos del producto -->
    @foreach( $recursos as $recurso )
        <tr>
            <td>{{$recurso->id}}</td>
            <td>{{$recurso->title}}</td>
            <td><a href="{{$recurso->video}}">{{$recurso->video}}</a></td>
            <td>{{$recurso->autor}}</td>
            <td>{{$recurso->nombre_categoria}}</td>
            <td>
            <!-- Botones de editar y borrar pasando el ID mediante GET -->
                <button type="submit" class="btn btn-success"><a href="{{ route('recurso.edit', $recurso->id) }}"><i class="fa fa-pencil"></i></button>
                <form action="{{ route('recurso.destroy', $recurso->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop