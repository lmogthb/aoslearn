@extends('layouts.master')
@section('content')
<h2>{{ __('Recursos')}}</h2>
<div class="row">
@foreach( $recursos as $recurso )
   <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100">
         <img class="card-img-top" src="">
         <div class="card-body">
            <h5 class="card-title">{{$recurso->title}}</a></h5>
            <p class="card-text">{{$recurso->autor}}</p>
            <div class="row">
               <div class="col">
               <iframe width="310" height="310" src="{{$recurso->video}}" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="col">
                  <a href="{{$recurso->video}}" target="_blank" class="btn btn-success btn-block" >{{ __('IR AL ENLACE')}}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
</div>
@stop


