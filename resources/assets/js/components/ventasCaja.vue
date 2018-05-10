<template>
<div class="container containerform">
    <div class="row">
        <div class="col s12">
            <div class="card">
              <div class="card-content gray-text">
                <span class="card-title center">Ventas por caja</span>
                <div class="row red-text text-darken-4" style="margin-top: 20px; ">
                    <!-- <div class="col m3 l3"></div> -->
                        <div class="col s12 m6 l6 center">
                            <select class="browser-default" style="margin: 15px 0" v-model="numero_caja" >
                                <option value="" disabled selected>Selecciona una caja</option>
                                <option v-for="caja in cajas" :key="caja.codigoUsuario" v-bind:value="caja.codigoUsuario">Caja # {{caja.codigoUsuario}}</option>
                            </select>
                        </div>
                         <div class="col s12 m6 l6">
							 <label for="icon_prefix">Fecha Inicio</label>
							<div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input id="icon_prefix"  type="date" class="" v-model="fecha_inicio">
                            </div>
                        </div>

                         <div class="col s12 m6 l6 ">
							 <label for="icon_prefix2">Fecha Fin</label>
                            <div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input id="icon_prefix2" type="date" class="" v-model="fecha_fin">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
				<div class="card-action">
					<button @click="totalVentasCaja()" v-if="!validarFechas" class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" >Consultar
						<i class="material-icons right">search</i>
						</button>
					<button @click="totalVentasCaja()" v-else class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" disabled>Consultar
						<i class="material-icons right">search</i>
						</button>
				</div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Efectivo</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.valorEfectivo}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Crédito</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.valorCredito}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Débito</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.valorDebito}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Cheques</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.valorCheque}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Bonos</p>
					<div style="text-align: right">
						<h4 class="card-stats-number " style="margin-left: 100px">${{ventas.valorBono}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> CXC</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" >${{ventas.valorCXC}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
				
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Recaudo</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.totalFactura}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
			</div>
		</div>
		<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Egresos</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.totalEgresos}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
			</div>
		</div>
				<div class="col s12 m6 l6">
			<div class="card hoverable">
				<div class="card-content  white red-text text-darken-4">
					<p class="card-stats-title"><i class="mdi-social-group-add"></i> NETO</p>
					<div style="text-align: right">
						<h4 class="card-stats-number" style="margin-left: 100px">${{ventas.valorNeto}}</h4>
					</div>
					<!-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="red-text text-lighten-5">from yesterday</span>
					</p> -->
				</div>
			</div>
		</div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            //console.log('Ventas por cajas.')
            $('.button-collapse').sideNav('hide')//Ocultar el SideNav
           this.mostrarCajas()
        },
        data(){
            return {
				cajas: [],
				fecha_inicio: '',
				fecha_fin: '',
				numero_caja: '',
				ventas: []
            }
        },
        methods: {
			/** 
			* Consulta los datos de las cajas y los guarda en la variable cajas
			 */
            mostrarCajas() {
                axios.get('/api/cajas')
                .then((res) => {
                    this.cajas = res.data
                })
                .catch((err) =>{
                    console.log(err)
                })
            },
			/** 
			* Envia los datos de la vista a la API facturas
			 */
			totalVentasCaja(){
				var url = '/api/facturas'
				axios.post(url,{
					fecha_inicio: this.fecha_inicio+' 00:00:00',
					fecha_fin: this.fecha_fin+' 23:00:00',
					numero_caja: this.numero_caja
				}).then((res) => {
					this.ventas = res.data[0]
					if(res.data[0].totalFactura == 0 || this.numero_caja == ''){//Valida que hayan registros de ventas en las fechas seleccionadas
						var msj = "No se han encontrado registros de ventas";
            			var $toastContent = $('<span>'+msj+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >X</button>'));
            			Materialize.toast($toastContent, 3000);
					}else{
						var msj = "Consulta Actualizada";
            			var $toastContent = $('<span>'+msj+'</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action" >X</button>'));
            			Materialize.toast($toastContent, 3000);
					}
				}).catch((err) => {
					console.log(err)
				})
			}
        },
		computed:{
			/** 
			* Metodo que se ejecuta si alguna de las dependencias (fecha_inicio, fecha_fin) cambian
			 */
			validarFechas(){
				if(this.fecha_inicio > this.fecha_fin){//Valida que la fecha de inicio sea menor que la fehca Fin
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
