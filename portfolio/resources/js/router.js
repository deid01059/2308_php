import { createWebHistory, createRouter } from 'vue-router';

import BoardComponent from '../components/BoardComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import RegistComponent from '../components/RegistComponent.vue';
import InfoComponent from '../components/InfoComponent.vue';
import store from './store.js';

const routes = [
	{
		path: "/",
		redirect : '/main'
	},
	{
		path: "/main",
		component: BoardComponent
	},
	{
		path: "/login",
		component: LoginComponent,
		beforeEnter: (to, from, next) => {
			if (store.state.loginFlg) {
				next('/');
			} else {
				next();
			}
		},
	},
	{
		path: "/regist",
		component: RegistComponent,
		beforeEnter: (to, from, next) => {
			if (store.state.loginFlg) {
				next('/');
			} else {
				next();
			}
		},
	},
	{
		path: "/info",
		component: InfoComponent,
		beforeEnter: (to, from, next) => {
			if (!(store.state.loginFlg)) {
				next('/');
			} else {
				next();
			}
		},
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;