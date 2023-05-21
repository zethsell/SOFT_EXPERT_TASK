import './assets/main.css'

import { createApp } from 'vue'
import { pinia } from './stores'
import {FontAwesomeIcon} from './plugins/font-awesome'
import App from './App.vue'
import { router } from './router'

const app = createApp(App)

app.use(pinia)
app.use(router)
app.component('FaIcon', FontAwesomeIcon)
app.mount('#app')
