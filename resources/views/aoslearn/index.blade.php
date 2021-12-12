@extends('layouts.master')
@section('content')
<h2>{{ __('Recursos')}}</h2>
<div class="row">
@foreach( $recursos as $recurso )
   <div class="col-12 col-md-6 col-lg-4 mb-2">
      <div class="card h-100">
         <img class="card-img-top" src="">
         <div class="card-body">
            <h5 class="card-title">{{$recurso->title}}</a></h5>
            <p class="card-text">{{$recurso->autor}}</p>
            <div class="row">
               <div class="col-sm-12">
                  <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                     <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="{{$recurso->video}}" allowfullscreen=""></iframe>
                     </div>
                     <a href="{{$recurso->video}}" target="_blank" class="btn btn-success btn-block mt-1" >{{ __('IR AL ENLACE')}}</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
</div>
@stop


