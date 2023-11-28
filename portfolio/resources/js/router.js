import { createWebHistory, createRouter } from 'vue-router';
import BoardComponent from '../components/BoardComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import RegistComponent from '../components/RegistComponent.vue';

const routes = [

];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;