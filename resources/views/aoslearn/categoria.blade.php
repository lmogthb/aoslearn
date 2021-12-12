@extends('layouts.master')
@section('content')
@foreach( $categoriaInfo as $info )
<h2>{{$info->nombre_categoria}}</h2>
@endforeach
<div class="row">
@foreach( $categoriaRecursos as $recursoCat )
   <div class="col-12 col-md-6 col-lg-4 mb-2">
      <div class="card h-100 mb-2">
         <img class="card-img-top" src="">
         <div class="card-body">
            <h5 class="card-title">{{$recursoCat->title}}</a></h5>
            <p class="card-text">{{$recursoCat->autor}}</p>
            <div class="row">
            <div class="col-sm-12">
                  <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                     <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="{{$recursoCat->video}}" allowfullscreen=""></iframe>
                     </div>
                     <a href="{{$recursoCat->video}}" target="_blank" class="btn btn-success btn-block mt-1" >{{ __('IR AL ENLACE')}}</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach
</div>
@stop