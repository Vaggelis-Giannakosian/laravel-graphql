import './bootstrap'
import Vue from 'vue';
import VueApollo from 'vue-apollo'
import VueRouter from 'vue-router';
import PostList from "./views/PostList";
import Post from "./views/Post";
import ApolloClient from 'apollo-boost'
import TopicPostList from "./views/TopicPostList";

window.Vue = Vue;

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
    },
    {
        path:'/topics/:slug',
        name:'topic',
        component: TopicPostList
    }
];

const router = new VueRouter({
    routes,
    mode:'history'
})


Vue.use(VueApollo);

const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: 'http://graph.test/graphql'
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient
})

const app = new Vue({
    el: '#app',
    router,
    apolloProvider
});
