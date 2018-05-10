<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Practy Stock</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/materialize.css') }}" rel="stylesheet">
   
</head>
<body bgcolor="#f5f5f5">
    <div id="app"> 
        <header>
            <div class="navbar-fixed white">
                <nav class="white z-depth-1">
                    <div class="nav-wrapper">
                
                    <ul class="left" style="position: fixed; left: 0%; top: 0%">
                        <a data-activates='mobile-demo' class='show-on-large button-collapse' ><i class='material-icons black-text'>menu</i>   <!-- este es el icono --> </a>
                    </ul>  
                    <ul class="center-align">
                        <img style="margin-top: 3px; width: 135px" class="logoadmin" src="{{asset('assets/images/Practy logo.png')}}">
                    </ul>
                    </div>
                </nav>
            </div>

            <div class="white z-depth-0 transparent hide-on-med-and-up" >
                <div class="parallax-container" style="height: 320px;">
                    <div class="parallax"><img style="background-position: center;" src="{{asset('assets/images/parallaxsmallscreen.png')}}"></div>
                </div>
            </div>

            <div class="white z-depth-0 transparent hide-on-small-only" >
                <div class="parallax-container" style="height: 320px;">
                    <div class="parallax"><img style="background-position: center;" src="{{asset('assets/images/parallax.png')}}"></div>
                </div>
            </div>

            <ul class="side-nav"  id="mobile-demo">
                <li>
                    <div class="user-view" style=" padding-bottom: 55%;">
                        <div class="background">
                        <img src="assets/images/p logo.png" class="responsive-img" style=" background-position: center;">
                        </div>
                        <a style="top: 50px;" ><img class="circle z-depth-5 responsive-img tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bienvenido" src="assets/images/user.png" ></a>
                        <div class="row" style="position: absolute; display: inline-block; left: -20px; top: 163px;">
                            <div>
                                <div class="card z-depth-0" style="height: 90px; background: rgba(0, 0, 0, 0.8); min-height: 80px; width: 320px;">
                                    <div class="card-content white-text" style=" padding-top: 2px; margin: 0px">
                                        <p class="center" style="font-size: bold; ">{{Auth::user()->Nombres}}</p>
                                        <p class="center" style="font-size: bold; ">{{Auth::user()->Apellidos}}</p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <div style="top: 500px">
                    <li>                    

                    </li>
                    <li>
                        <router-link to="/home" class="collapsible-header waves-effect waves-teal active">
                            <i class="material-icons light">home</i>Home
                        </router-link>
                    </li>
                    <li>
                        <router-link  to="/ventas/globales" class="collapsible-header waves-effect waves-teal active">
                            <i class="material-icons light">assessment</i>Ventas Globales
                        </router-link >
                    </li>
                    <li>
                        <router-link  to="/ventas/porCaja" class="collapsible-header waves-effect waves-teal active">
                            <i class="material-icons light">attach_money</i>Ventas Por Caja
                        </router-link >
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="collapsible-header waves-effect waves-teal active"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons light">highlight_off</i>Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </div> 

            </ul>
        </header>
        <router-view></router-view>
    </div>

    <footer class='page-footer red darken-4'>
        <div class='container '>
            <div class='row'>
                <div class='col l6 s12 '>
                    <h5 class='white-text'>PractyStock</h5>
                    <p class='grey-text text-lighten-4'>
                    </p>
                </div>

                <div class='col l4 offset-l2 s12'>
                
                
                </div>
            </div>
        </div>
    
        <div class='footer-copyright '>
            <div class='container'>
                © 2018 Practy Labs S.A.S
                <a class='grey-text text-lighten-4 right' href='http://practylabs.com'>Practy</a>
            </div>
        </div>
    
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
    <script src="{{asset('js/vue-app.js')}}"></script>
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>
    <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
    @yield('ini-scripts')
    <script type="text/Javascript">
        // $(function(){
        //     $(".button-collapse").sideNav('hide');
        // });

        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $('select').material_select();
            $('.parallax').parallax();
            $('.slider').slider();
            $('.collapsible').collapsible();
            setTimeout(function(){ $('.collapsible').collapsible('open', 0); }, 500);
        });
    </script> 

</body>
</html>
