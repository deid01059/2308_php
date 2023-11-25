require('./bootstrap');
import { createApp } from 'vue'
import Main from '../Main.vue'
import store from './store.js'
import router from './router.js'

createApp(Main)
.use(store)
.use(router)
.mount('#main')
