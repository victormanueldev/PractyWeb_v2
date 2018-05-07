import Home from './components/home.vue';
import VentasGlobales from './components/ventasGlobales.vue';
import VentasPorCaja from './components/ventasCaja.vue';

export const routes = [
    
    {
        path: '/ventas/globales',
        component: VentasGlobales
    },
    {
        path: '/ventas/porCaja',
        component: VentasPorCaja
    },
    {
        path: '/home',
        component: Home
    }
    
];