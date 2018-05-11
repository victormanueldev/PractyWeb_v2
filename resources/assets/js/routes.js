import Home from './components/home.vue';
import VentasGlobales from './components/ventasGlobales.vue';
import VentasPorCaja from './components/ventasCaja.vue';
import VentasLinea from './components/ventasLinea.vue';

export const routes = [
    
    {
        path: '/ventas/globales',
        component: VentasGlobales
    },
    {
        path: '/ventas/caja',
        component: VentasPorCaja
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/ventas/linea',
        component: VentasLinea
    }
    
];