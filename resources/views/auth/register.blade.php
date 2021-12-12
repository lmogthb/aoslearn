@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="{{ asset('css/stylelogin.css') }}">
@section('content')
<div class="card card0 border-0">
    <div class="row d-flex">
        <div class="col-lg-6">
            <div class="card2 card border-0 px-4 py-5">
                <h3 class="mb-1">Crear una cuenta en AOSLearn</h3>
                <p class="font-weight-bold">¿Ya tiene una cuenta? <a class="text-danger " href="{{ route('login') }}">Iniciar sesion</a></p>
                <form action="{{ route('register') }}" method="post">
                @csrf
                    <div class="row px-3"> 
                        <label class="mb-0">
                            <h6 class="mb-0 text-sm">Nombre</h6>
                        </label> 
                    <input type="text" name="name"> 
                    @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <br>
                    <div class="row px-3"> 
                        <label class="mb-0">
                            <h6 class="mb-0 text-sm">Correo</h6>
                        </label> 
                    <input type="text" name="email"> 
                    @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                    <br>
                    <div class="row px-3"> 
                        <label class="mb-0">
                            <h6 class="mb-0 text-sm">Contraseña</h6>
                        </label> 
                        <input type="password" name="password"> 
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="row px-3"> 
                        <label class="mb-0">
                            <h6 class="mb-0 text-sm">Confirmar contraseña</h6>
                        </label> 
                        <input type="password" name="password_confirmation">
                    </div>
                    <br>
                    <div class="row mb-4">
                        <div class="col-md-5"> <button type="submit" class="btn btn-blue text-center mb-1">Crear cuenta</button> </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-5"> <a class="btn btn-green text-center mb-1" href="{{ route('recurso.index') }}">Volver atras</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
