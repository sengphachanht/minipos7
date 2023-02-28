import { createWebHistory, createRouter } from "vue-router"

import { useStorage } from "vue3-storage"
const storage = useStorage()

 import Store from "../Pages/Store.vue"
 import Report from "../Pages/Report.vue"
 import Pos from "../Pages/Pos.vue"
 import Transection from "../Pages/Transection.vue"
 import Login from "../Pages/Login.vue"
 import Register from "../Pages/Register.vue"

 export const routes = [
    {
        name: "store",
        path: "/store",
        component:Store
    },
    {
        name: "transection",
        path: "/transection",
        component:Transection
    },
    {
        name: "pos",
        path: "/pos",
        component:Pos
    },
    {
        name: "report",
        path: "/report",
        component:Report
    },
    {
        name: "login",
        path: "/login",
        component:Login
    },
    {
        name: "register",
        path: "/register",
        component:Register
    },

 ]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior(){
        window.scrollTo(0,0)
    }
})

router.beforeEach((to, from, next)=> {

    console.log(storage.getStorageSync("vue-isLoggin"))
    console.log(window.Laravel.isLoggin)

    if(to.path=="/register"){
        next()
    } else {
        if(to.path=="/" && storage.getStorageSync("vue-isLoggin") && !window.Laravel.isLoggin){
            next({
                path:"/login",
                replace: true
            })
        }
         else if(to.path!="/login" && !storage.getStorageSync("vue-isLoggin") && !window.Laravel.isLoggin){
            next({
                path:"/login",
                replace: true
            })
        } else {
            if(to.path=="/login" && storage.getStorageSync("vue-isLoggin") && window.Laravel.isLoggin){
                next({
                    path:"/store",
                    replace: true
                })
            } else {
                next()
            }
        }
    }

})

export default router
