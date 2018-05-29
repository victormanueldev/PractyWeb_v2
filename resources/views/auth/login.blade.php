<!DOCTYPE html>
<html>
<head>
  <title>Practy Stock | Login</title>
  <link rel="stylesheet" href="{{asset('assets/css/materialize.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/login.component.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
</head>
<body>
  <div class="fondo">
    <div class="row"> 
        <div class="cardlogin">
            <div class="col s0 m3 l4"></div>
            <div class="col s12 m6 l4">
                <br>
                    <div class="card z-depth-3 hoverable cardlogincard">
                        <div class="card-content">
                            <form class="col s12" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                                <div class="row ">
                                    <div class="col m1 l1"></div> 
                                    <div class="col s12 m12 l10">

                                        
                                        <h5 class="center">Inicio de sesion</h5><br/>
                                
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">person</i>
                                            <input  name="login" value="{{ old('login') }}" placeholder="Numero de identificación" id="login"  type="text" class="validate" required>
                                        </div>
                                
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input name="password" placeholder="Contraseña" id="password" type="password" class="validate"  required >
                                        </div>
                                
                                    <div class="center"><button class="btn-large waves-effect waves-light red darken-2" type="submit" style="margin-top:10px;">Iniciar Sesion<i class="material-icons right">send</i></button></div>
                                
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
            </div>
        </div>
    </div>
  </div>


</body>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>
    @if ($errors->has('login'))
        <!-- <span class="help-block">
            <strong>{{ $errors->first('login') }}</strong>
        </span> -->
        <script>
            
            var error = "Estas credenciales no coinciden con nuestros registros";
            var $toastContent = $('<span>'+error+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >Cerrar</button>'));
            Materialize.toast($toastContent, 8000);
        </script>

    @endif

</html>