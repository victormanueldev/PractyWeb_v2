<template>
<div class="container containerform">
    <div class="row">
        <div class="col s12">
            <div class="card">
              <div class="card-content gray-text">
                <span class="card-title center">Ventas por caja</span>
                <div class="row red-text text-darken-4" style="margin-top: 20px; ">
                         <div class="col s12 m6 l6">
							 <label for="icon_prefix">Fecha Inicio</label>
							<div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input id="icon_prefix"  type="date" class="" v-model="fecha_inicio" />
                            </div>
                        </div>

                         <div class="col s12 m6 l6 ">
							 <label for="icon_prefix2">Fecha Fin</label>
                            <div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input id="icon_prefix2" type="date" class="" v-model="fecha_fin">
                            </div>
                        </div>
                        
                        <div class="col s12 m6 l6 center">
                            <select class="browser-default" style="margin: 15px 0" v-model="linea" >
                                <option value="" disabled selected>Selecciona una linea</option>
                                <option value="">TODAS</option>
                                <option v-for="linea in lineas" :key="linea.codigo" v-bind:value="linea.codigo">{{linea.nombre}}</option>
                            </select>
                        </div>
                    </div>
                </div>
				<div class="card-action">
					<button @click="totalVentasLinea()" v-if="!validarFechas" class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" >Consultar
						<i class="material-icons right">search</i>
						</button>
					<button @click="totalVentasLinea()" v-else class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" disabled>Consultar
						<i class="material-icons right">search</i>
						</button>
				</div>
            </div>
        </div>
        <div class="col s12" >

            <ul  class="collapsible expandable  hoverable "  data-collapsible="expandable">
                <li v-for="venta in ventas" :key="venta.nombre">
                <div class="collapsible-header"><span class="card-title"><h5 class="center red-text text-darken-4">{{venta.nombre_linea}}</h5></span></div>
                <div class="collapsible-body" style="padding: 10px 10px;">
                  Cantidad<a href="#!" class="secondary-content red-text">{{venta.cantidad_total}}</a>
                </div>
                <div class="collapsible-body" style="padding: 10px 10px;">

                    Total Ventas<a href="#!" class="secondary-content red-text">$ {{venta.total_ventas}}</a>
                </div>
                <div class="collapsible-body" style="padding: 10px 10px;">

                    Costo<a href="#!" class="secondary-content red-text">$ {{venta.costo_total}}</a>
                </div>
                <div class="collapsible-body" style="padding: 10px 10px;">

                    Procentaje<a href="#!" class="secondary-content red-text">15 %</a>
                </div>
                <div class="collapsible-body" style="padding: 10px 10px;">

                    Utilidad<a href="#!" class="secondary-content red-text">$ {{venta.utilidad}}</a> 
                </div>
                </li>
            </ul>




            
        </div>
    </div>
</div>
</template>

<script>

    export default {
        mounted() {
            console.log('Ventas por linea.')
            $('.button-collapse').sideNav('hide')//Ocultar el SideNav
            $('.collapsible').collapsible();
            this.obtenerLineas()
        },
        data(){
            return {
                //Iniciailizacion de variables
                fecha_inicio: '',
                fecha_fin: '',
                lineas: [],
                linea: '',
                ventas: []
            }
        },
        methods:{
            /**
            * Obtiene las lineas de la Base de datos para llenar el Select
            */
            obtenerLineas(){
                //Peticion GET al API
                axios.get('/api/lineas')
                .then((res) => {
                    this.lineas = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            /**
            * Obtiene los datos de la consulta de las ventas por lineas
            **/
            totalVentasLinea(){
                //Valida que las fechas no estén vacias
                if(this.fecha_inicio != '' || this.fecha_fin != ''){
                    //Peticion POST al API 
                    axios.post('/api/lineas', {
                        //Parametros de la peticion
                        fecha_inicio: this.fecha_inicio,
                        fecha_fin: this.fecha_fin,
                        codigoLinea: this.linea
                    }).then((res) => {                        
                        this.ventas = res.data
                        var msj = "Consulta Actualizada";
                        var $toastContent = $('<span>'+msj+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >X</button>'));
                        Materialize.toast($toastContent, 3000);
                    }).catch((err) => {
                        console.log(err)
                    })
                }else{
                    var msj = "No hay fechas seleccionadas";
                    var $toastContent = $('<span>'+msj+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >X</button>'));
                    Materialize.toast($toastContent, 3000);
                }
            }
        },
        computed:{
            /**
            * Valida que la fecha de inicio sea menor a la fecha fin
            **/
			validarFechas(){
				if(this.fecha_inicio > this.fecha_fin){
					var msj = "La fecha de inicio debe ser menor a la fecha fin"
            		var $toastContent = $('<span>'+msj+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >X</button>'))
            		Materialize.toast($toastContent, 5000)
					return true
				}else if(this.fecha_fin == ''){
					return 
				}
			}
        }
    }
</script>
