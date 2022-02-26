require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';


Vue.component('sidebar', require('./components/sidebar-future.vue').default);

const routes = [
    {path: "/sb", component:require('./components/sidebar-future.vue')}
];
const router = new VueRouter({
    routes
})
const app = new Vue({
    data:function(){
        return{example: "qwq"}
    },
    router
}).$mount("#app");
