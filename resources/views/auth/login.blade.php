@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="{{ asset('css/stylelogin.css') }}">
@section('content')
<div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <h3 class="mb-1">{{ __('Iniciar sesion en AOSLearn')}}</h3>
                    <br>
                    <form action="{{ route('login') }}" method="post">
                    @csrf
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Correo</h6>
                            </label> 
                        <input type="text" name="email" placeholder="{{ __('Introduzca un correo valido')}}" value="">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                        <br>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Contraseña</h6>
                            </label> 
                            <input type="password" name="password" placeholder="{{ __('Introduzca su contraseña')}}" value=""> 
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">{{ __('Iniciar Sesion')}}</button> </div>
                        <div class="row mb-3 px-3"> <a class="btn btn-green text-center" href="{{ route('recurso.index') }}">{{ __('Volver Atras')}}</a> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">{{ __('¿No tiene una cuenta?')}} <a class="text-danger " href="{{ route('register') }}">{{ __('Registrarse')}}</a></small> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop