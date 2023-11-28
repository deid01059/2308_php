import { createApp } from 'vue'
import App from './components/App.vue'
import store from './store.js'

createApp(App)
.use(store)
.mount('#app')
