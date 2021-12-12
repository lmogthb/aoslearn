<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <a class="navbar-brand" href="#">
   <img src="{{ asset('css/logoLara2.png') }}" alt="AOSLearn" style="width:50px;">
   </a>
   <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
         <li class="nav-item">
            <a class="nav-link" href="{{ route('recurso.index') }}">{{ __('Recursos')}}</a>
         </li>
         <!-- Si esta logeado, podra ver el menu de solicitudes -->
         <?php if(Auth::check()) : ?>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('solicitud.create') }}">{{ __('Solicitudes')}}</a>
            </li>
         <?php endif?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Categorias')}}</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
         @foreach( $categorias as $categoria )
            <a class="dropdown-item" href="{{ route('categoria.show' , $categoria->id_categoria) }}">{{$categoria->nombre_categoria}}</a>
         @endforeach
          </div>
        </li>
        <?php if(Auth::check() && Auth::user()->rol == 'admin') : ?>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">{{ __('Panel de Administrador')}}</a>
         </li>
         <?php endif?>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach (Config::get('languages') as $lang => $language)
                  @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                  @endif
            @endforeach
            </div>
         </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
      <?php if(Auth::check()) : ?>
         <form action="{{ route('logout') }}" method="POST" style="display:inline">
               {{ csrf_field() }}
               <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                  {{ __('Cerrar sesión')}}
               </button>
         </form>
      <?php else:?>
         <li class="nav-item">
         <a class="nav-link" href="{{ route('register') }}"><span class=""></span> {{ __('Registrarse')}}</a>
         </li>
         <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}"><span class="fas fa-sign-in-alt"></span> {{ __('Iniciar Sesion')}}</a>
         </li>
      <?php endif?>
      </ul>
   </div>
</nav>