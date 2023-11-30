require('./bootstrap');

import { createApp } from 'vue'
import MainComponent from '../components/MainComponent.vue'
import store from './store.js'
import VueCookies from "vue-cookies";
import router from './router.js'

const app = createApp({
	components: {
		MainComponent,
	}
})
.use(store)
.use(router)
.use(VueCookies);
app.config.globalProperties.$cookies.config("1d"); 

app.mount('#app');



