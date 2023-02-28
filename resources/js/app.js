import { createApp } from 'vue'
import App from './App.vue'
import Sidebar from './components/Sidebar.vue' 
import router from './router'
import axios from 'axios'
import Vue3Storage from "vue3-storage"
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'
import Cleave from 'vue-cleave-component'
import Pagination from './components/Pagination.vue'
import { createI18n } from "vue-i18n"
import en from "./locale/en.json"
import la from "./locale/la.json"
import ch from "./locale/ch.json"
import jp from "./locale/jp.json"
import vn from "./locale/vn.json"

const i18n = createI18n({
    locale:'la',
    messages:{
        en: en,
        la: la,
        ch: ch,
        jp: jp,
        vn: vn
        }
    })

require('./bootstrap');

const app = createApp(App)
app.use(i18n)
app.config.globalProperties.$axios = axios
app.use(VueSweetalert2)
app.use(router)
app.use(Cleave)
app.use(Vue3Storage, { namespace: "pro_"})
app.component('sidebar', Sidebar)
app.component('pagination', Pagination)
app.mount("#app-vue")
