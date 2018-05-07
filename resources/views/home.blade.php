@extends('layouts.app')
@section('content')

<main>

<style>
    .containerform{
        margin-top: 20px;
    }

    .logoadmin{
        width: 120px;
    }

    .formcomponents{
        margin: 20px;
    }
</style>

<div class="container containerform">
    <div class="row" style="margin-top: 30px; ">
        <div class="col s12 m6 l6 center">
            <ul class="collapsible expandable  hoverable">
                <li class="active">
                <div class="collapsible-header"><span class="card-title"><h5 class="center red-text text-darken-4">PractyStock</h5></span></div>
                <div class="collapsible-body">
                    <span class="flow-text grey-text text-darken-1">Bienvenido a PractyStock, un aplicativo
                        desarrollado para el control de inventario de la empresa.
                    </span>
                </div>
                </li>
            </ul>
        </div>

        <div class="col s12 m6 l6 center">
            <ul class="collapsible expandable  hoverable">
                <li class="active">
                <div class="collapsible-header"><span class="card-title"><h5 class="center red-text text-darken-4">Practico</h5></span></div>
                <div class="collapsible-body">
                    <span class="flow-text grey-text text-darken-1">
                        Aplicativo fácil de usar, intuitivo y pensado principalmente para la productividad de la empresa.
                    </span>
                </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="white z-depth-0 transparent hide-on-med-and-up" >
    <div class="parallax-container" style="height: 320px;">
        <div class="parallax"><img style="background-position: center;" src="{{asset('assets/images/parallaxhomesmallscreen.png')}}"></div>
    </div>
 
</div>
<div class="white z-depth-0 transparent hide-on-small-only" >
    <div class="parallax-container" style="height: 450px;">
        <div class="parallax"><img style="background-position: center;" src="{{asset('assets/images/parallaxhome.png')}}"></div>
    </div>
</div>

<div class="container containerform">
  <div class="row" style="margin-top: 30px; ">
    <div class="col s12 m6 l6 center">
        <ul class="collapsible expandable  hoverable">
            <li class="active">
              <div class="collapsible-header"><span class="card-title"><h5 class="center red-text text-darken-4">Versátil</h5></span></div>
              <div class="collapsible-body">
                  <span class="flow-text grey-text text-darken-1">
                      Nuestro aplicativo se acomoda a tus necesidades, no necesitas características especiales para utilizarlo, disfruta la veratilidad de PractyStock
                </span>
              </div>
            </li>
          </ul>
    </div>
  
    <div class="col s12 m6 l6 center">

        <ul class="collapsible expandable hoverable">
            <li class="active">
                <div class="collapsible-header"><span class="card-title"><h5 class="center red-text text-darken-4">Responsive</h5></span></div>
                <div class="collapsible-body">
                    <span class="flow-text grey-text text-darken-1">
                        Nuestro aplicativo se ajusta al tamaño de la pantalla de tu dispositivo, puedes usarlo sin problema en un móvil o un dispositivo de escritorio.
                    </span>
                </div>
            </li>
        </ul>
    </div>
  </div>
</div>

</main>
@endsection
@section('ini-scripts')
    <script type="text/javascript">


    $(document).ready(function(){
    $('.parallax').parallax();

    setTimeout(function(){ $('.collapsible').collapsible('open', 0); }, 500);
    

    });

    </script>

@endsection
