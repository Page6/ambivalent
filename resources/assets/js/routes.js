/*
 |-------------------------------------------------------------------------------
 | routes.js
 |-------------------------------------------------------------------------------
 | Contains all of the routes for the application
 */
// 包含所有单页面应用的前端路由。
// 在这里定义 Vue Router 使用的路由。

/**
 * Imports Vue and VueRouter to extend with the routes.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * Extends Vue to use Vue Router
 */
Vue.use( VueRouter )

/**
 * Makes a new VueRouter that we will use to run all of the routes for the app.
 */
// 每个路由都有一个名字，以便我们在应用中直接通过名字就可以访问该路由。
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Vue.component( 'Home', require( './pages/Home.vue' ) )
        },
        {
            path: '/cafes',
            name: 'cafes',
            component: Vue.component( 'Cafes', require( './pages/Cafes.vue' ) )
        },
        {
            path: '/cafes/new',
            name: 'newcafe',
            component: Vue.component( 'NewCafe', require( './pages/NewCafe.vue' ) )
        },
        {
            path: '/cafes/:id',
            name: 'cafe',
            component: Vue.component( 'Cafe', require( './pages/Cafe.vue' ) )
        }
    ]
});