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
                                <input id="icon_prefix"  type="date" class="" v-model="fecha_inicio"
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
                                <option value="" disabled selected>Selecciona una caja</option>
                                <option v-for="linea in lineas" :key="linea.codigo" v-bind:value="linea.nombre">{{linea.nombre}}</option>
                            </select>
                        </div>
                    </div>
                </div>
				<div class="card-action">

					<button @click="post()"  v-if="input" class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" >Consultar
						<i class="material-icons right">search</i>
						</button>
                     <button @click="post()"  v-else class="btn waves-effect waves-light btn-large red darken-4 " style="display: block; margin: auto; border-radius: 5px" type="submit" name="action" >Consultar
						<i class="material-icons right">search</i>
						</button>
				</div>
            </div>
        </div>
        <div class="col s12">
            <ul class="collection with-header hoverable">
                <li class="collection-header"><h4>Bebidas</h4></li>
                <li class="collection-item"><div>Cantidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Utilidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Procentaje<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Total Ventas<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
            </ul>
        </div>
        <div class="col s12">
            <ul class="collection with-header hoverable">
                <li class="collection-header"><h4>Licor</h4></li>
                <li class="collection-item"><div>Cantidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Utilidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Procentaje<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Total Ventas<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
            </ul>
        </div>
        <div class="col s12">
            <ul class="collection with-header hoverable">
                <li class="collection-header"><h4>Comida</h4></li>
                <li class="collection-item"><div>Cantidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Utilidad<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Procentaje<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
                <li class="collection-item"><div>Total Ventas<a href="#!" class="secondary-content red-text">$ 1.954.516</a></div></li>
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
            this.obtenerLineas()
        },
        data(){
            return {
                fecha_inicio: '',
                fecha_fin: '',
                lineas: [],
                linea
            }
        },
        methods:{
            obtenerLineas(){
                axios.get('/api/lineas')
                .then((res) => {
                    this.lineas = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            post(){
                axios.get('/cajas', {
                    auto: this.valor
                }).then((res) => {
                    console.log('OK')
                }).catch((err) => {
                    console.log(err)
                })
            }
        },
        computed:{
            input(){
                console.log(this.fecha_fin)
                console.log(this.text)
            }
        }
    }
</script>
