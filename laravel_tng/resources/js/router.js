import { createWebHistory, createRouter } from 'vue-router';

import Main from '../Main'
import Login from '../components/Login'
import Error from '../components/Error'
import Board from '../components/Board.vue'
import Regist from '../components/Regist.vue'
const routes = [
	{
		path: "/",
		redirect : '/main'
	},
	{
		path: "/main",
		component: Board
	},
	{
		path: "/login",
		component: Login
	},
	{
		path: "/error",
		component: Error
	},
	{
		path: "/regist",
		component: Regist
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;