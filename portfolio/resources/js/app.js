require('./bootstrap');

import { createApp } from 'vue'
import MainComponent from '../components/MainComponent.vue'
import store from './store.js'

createApp({
	components: {
		MainComponent,
	}
})
.use(store)
.mount('#app')
