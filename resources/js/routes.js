import AllFood from './components/food/AllFood.vue';
import CreateFood from './components/food/CreateFood.vue';
import EditFood from './components/food/EditFood.vue';

export const routes = [
   {
    name: 'home',
    path: '/',
    component: AllFood
   },
   {
    name: 'create',
    path: '/create',
    component: CreateFood
   },
   {
    name: 'edit',
    path: '/edit',
    component: EditFood
   }
]
