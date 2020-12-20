
import './bootstrap'

// import Vue from 'vue'
import Vue from 'vue';
window.Vue = Vue;

import VueRouter from 'vue-router';
import PostList from "./views/PostList";
import Post from "./views/Post";

Vue.use(VueRouter);

const routes = [
    {
        path:'/',
        name:'index',
        component: PostList
    },
    {
        path:'/posts/:id',
        name:'post',
        component: Post
    }
];

const router = new VueRouter({
    routes,
    mode:'history'
})

const app = new Vue({
    el: '#app',
    router
});
