require('./bootstrap');

import { createApp } from 'vue'
import MainComponent from '../components/MainComponent.vue'
import store from './store.js'
import router from './router.js'

createApp({
	components: {
		MainComponent,
	}
})
.use(store)
.use(router)
.mount('#app')
