@extends('layouts.master')
@section('content')
<div class="text-left">
    <a class="btn btn-success" role="button" href="{{ route('adminActuales') }}">{{ __('Mostrar recursos actuales || Acciones')}}</a>
    <a class="btn btn-info" role="button" href="{{ route('categoria.create') }}">{{ __('Añadir nueva categoria')}}</a>
</div>
<br>
<h2>{{ __('Solicitudes actuales')}}</h2>
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
    @foreach( $solicitudes as $solicitud )
        <tr>
            <td>{{$solicitud->id}}</td>
            <td>{{$solicitud->title}}</td>
            <td><a href="{{$solicitud->video}}">{{$solicitud->video}}</a></td>
            <td>{{$solicitud->autor}}</td>
            <td>{{$solicitud->nombre_categoria}}</td>
            <td>
            <!-- Botones de editar y borrar pasando el ID mediante GET -->
                <form action="{{ route('active', $solicitud->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                </form>
                <form action="{{ route('solicitud.destroy', $solicitud->id) }}" method="POST" style="display:inline">
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