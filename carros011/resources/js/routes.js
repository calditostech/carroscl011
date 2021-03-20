import AllCarros from './components/AllCarros.vue';
import CreateCarros from './components/CreateCarros.vue';
import EditCarros from './components/EditCarros.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllCarros
    },
    {
        name: 'create',
        path: '/create',
        component: CreateCarros
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditCarros
    }
];