@extends('layouts.master')
@section('content')
@foreach( $categoriaInfo as $info )
<h2>{{$info->nombre_categoria}}</h2>
@endforeach
<div class="row">
@foreach( $categoriaRecursos as $recursoCat )
   <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
         <img class="card-img-top" src="">
         <div class="card-body h-80">
            <h5 class="card-title">{{$recursoCat->title}}</a></h5>
            <p class="card-text">{{$recursoCat->autor}}</p>
            <div class="row">
               <div class="col">
               <iframe width="310" height="310" src="{{$recursoCat->video}}" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="col">
                  <a href="{{$recursoCat->video}}" target="_blank" class="btn btn-success btn-block" >{{ __('IR AL ENLACE')}}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
</div>
@stop