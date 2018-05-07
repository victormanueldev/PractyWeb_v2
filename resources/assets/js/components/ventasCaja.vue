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
                            <select class="browser-default">
                                <option value="" disabled selected>Selecciona una caja</option>
                                <option v-for="caja in cajas" :key="caja.codigoUsuario">Caja # {{caja.codigoUsuario}}</option>
                            </select>
                        </div>
                        <div class="col s12 m6 l6 center">
                            <div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" class="datepicker">
                                <label for="icon_prefix">Fecha Inicio</label>
                            </div>
                        </div>

                         <div class="col s12 m6 l6 center">
                            <div class="input-field center ">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" class="datepicker">
                                <label for="icon_prefix">Fecha Fin</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    
    export default {
        mounted() {
            console.log('Ventas por cajas.')
            $('.button-collapse').sideNav('hide')
            $('.collapsible').collapsible()
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false, // Close upon selecting a date,
                container: undefined, // ex. 'body' will append picker to body
            });
           this.fetchData()
        },
        data(){
            return {
                cajas: []
            }
        },
        methods: {
            fetchData() {
                axios.get('/api/cajas')
                .then((res) => {
                    this.cajas = res.data
                    
                })
                .catch((err) =>{
                    console.log(err)
                })
            },
            mostrarCaja(usuario) {
                console.log(usuario)
            }
        }
    }
</script>
