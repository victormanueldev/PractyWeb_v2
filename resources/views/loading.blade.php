<!DOCTYPE html>
<html>
<head>
  <title>Cargando</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('assets/css/materialize.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/iniciando.component.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
</head>
<body onLoad='redireccionar1()'>
<div class="fondo" id="app">
    <div class="row"> 
    <div class="cardlogin">
    
        <div class="col s0 m3 l4"></div>
        
        <div class="col s12 m6 l4">
            <br>
              <div class="card z-depth-3 hoverable cardlogincard" style="background:rgba(255, 255, 255, 0.87);">
                <div class="card-content">
    
                  
   
    <div class="row center">
      <div class="col m1 l1"></div> 
        <div class="col s12 m12 l10">
            
             <a ><img class="circle z-depth-5 responsive-img" src="{{asset('assets/images/user.png')}}" width="100"></a> <br><br>
            <a ><span class="black-text ">{{Auth::user()->Nombres}}</span></a>
        
            
             <h5 class="black-text ">Cargando pagina principal</h5> 
            <br>

            
            <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-red-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
            <br><br>

        </div>
    
    </div>
   
                </div> 
              </div>
  
        </div>
  
    </div>
    </div>
    </div>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script language='JavaScript'>
  //var host = window.location.host;
    var pagina= "/home";
    function redireccionar() {
      location.href=pagina;
    }

    function redireccionar1() {
      setTimeout ("redireccionar()", 2000);
    }
    
  </script>

</html>

