require('./bootstrap');



import { createApp } from 'vue'
import AppComponent from './components/AppComponent'

const app = createApp({})

import router from './router';
app.component('app-component', AppComponent)
app.use(router)
app.mount('#app')
