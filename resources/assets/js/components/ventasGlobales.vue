<template>
<div class="container containerform">
    <div class="row">
        <div class="col s12">
            <div class="card">
              <div class="card-content white-text">
                <span class="card-title">Ventas</span>
                <div class="row red-text text-darken-4" style="margin-top: 30px; ">
        
                        <div class="col s12 m6 l12 center">
                            
                            <div class="input-field col s12">
                                <i class="material-icons prefix" style="left:0%;">move_to_inbox</i>
                                <select>
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    
                                </select>
                                <label>Caja</label>
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
            console.log('Ventas Globales')
            $('.button-collapse').sideNav('hide');
            $('select').material_select();
        }
    }
</script>
