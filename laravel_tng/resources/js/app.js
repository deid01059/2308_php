require('./bootstrap');
import { createApp } from 'vue'
import AppComponent from '../components/AppComponent'
import MyHeaderComponent from '../components/MyHeaderComponent'
import store from './store.js'
import router from './router.js'

createApp({
	components: {
		AppComponent,
		MyHeaderComponent,
	}
})
.use(store)
.use(router)
.mount('#app')
