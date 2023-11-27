import { createWebHistory, createRouter } from 'vue-router';


import LoginComponent from '../components/LoginComponent'
import ErrorComponent from '../components/ErrorComponent'
import BoardComponent from '../components/BoardComponent.vue'
import RegistComponent from '../components/RegistComponent.vue'
import MainComponent from '../components/MainComponent.vue'
const routes = [
	{
		path: "/",
		redirect : '/main'
	},
	{
		path: "/main",
		component: MainComponent
	},
	{
		path: "/board",
		component: BoardComponent
	},
	{
		path: "/login",
		component: LoginComponent
	},
	{
		path: "/error",
		component: ErrorComponent
	},
	{
		path: "/regist",
		component: RegistComponent
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;