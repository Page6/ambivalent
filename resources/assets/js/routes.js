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
// import iView from 'iview';
import 'iview/dist/styles/iview.css';

/**
 * Extends Vue to use Vue Router
 */
Vue.use( VueRouter );
// Vue.use( iView );

/**
 * Imports iView components
 */
import { 
    Button,
    Row,
    Col,
    Menu,
    MenuGroup,
    Submenu,
    MenuItem,
    Icon,
    Breadcrumb,
    BreadcrumbItem,
    Layout,
    Header,
    Sider,
    Message,
    Modal,
    Card,
    Form,
    FormItem,
    Input,
    Table,
    Select,
    Option,
    OptionGroup,
    DatePicker,
    Spin
} from 'iview';

Vue.component('Button', Button);
Vue.component('Row', Row);
Vue.component('Col', Col);
Vue.component('Menu', Menu);
Vue.component('MenuGroup', MenuGroup);
Vue.component('Submenu', Submenu);
Vue.component('MenuItem', MenuItem);
Vue.component('Icon', Icon);
Vue.component('Breadcrumb', Breadcrumb);
Vue.component('BreadcrumbItem', BreadcrumbItem);
Vue.component('Layout', Layout);
Vue.component('Header', Header);
Vue.component('Sider', Sider);
Vue.prototype.$Message = Message;
Vue.component('Modal', Modal);
Vue.component('Card', Card);
Vue.component('Form', Form);
Vue.component('FormItem', FormItem);
Vue.component('Input', Input);
Vue.component('Table', Table);
Vue.component('Select', Select);
Vue.component('Option', Option);
Vue.component('OptionGroup', OptionGroup);
Vue.component('DatePicker', DatePicker);
Vue.prototype.$Spin = Spin;
Vue.component('Spin', Spin);

/**
 * Makes a new VueRouter that we will use to run all of the routes for the app.
 */
// 每个路由都有一个名字，以便我们在应用中直接通过名字就可以访问该路由。
export default new VueRouter({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Vue.component( 'Login', require( './pages/Login.vue' ) ),
        },
        {
            path: '/',
            redirect: {name: 'home'},
            name: 'layout',
            component: Vue.component( 'Home', require( './pages/Layout.vue' ) ),
            beforeEnter: (to, from, next) => {
                if (window.sessionStorage.getItem('userName')==null) {
                    next({path: '/login'});
                } else {
                    next();
                }
            },
            children: [
                {
                    path: 'home',
                    name: 'home',
                    component: Vue.component( 'Home', require( './pages/Home.vue' ) )
                },
                {
                    path: 'reports',
                    name: 'reports',
                    component: Vue.component( 'Reports', require( './pages/Reports.vue' ) )
                },
                {
                    path: 'reports/:id',
                    name: 'report',
                    component: Vue.component( 'Report', require( './pages/Report.vue' ) )
                },
                {
                    path: 'cafes',
                    name: 'cafes',
                    component: Vue.component( 'Cafes', require( './pages/Cafes.vue' ) ),
                },
                {
                    path: 'cafes/new',
                    name: 'newcafe',
                    component: Vue.component( 'NewCafe', require( './pages/NewCafe.vue' ) )
                },
                {
                    path: 'cafes/:id',
                    name: 'cafe',
                    component: Vue.component( 'Cafe', require( './pages/Cafe.vue' ) )
                }
            ]
        }
    ]
});