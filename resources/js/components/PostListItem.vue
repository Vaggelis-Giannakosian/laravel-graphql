<template>
    <div>
        <router-link :to="{name:'post', params:{id:post.id}}">
            <h4 class="hover:underline text-2xl pb-3 font-semibold" v-text="post.title"></h4>
        </router-link>
        <p  class="text-gray-600 pb-3" v-html="post.lead"></p>
        <div class="text-sm text-gray-600">
            Written by {{post.author.name}} in
            <router-link :to="{name:'topic', params:{slug: post.topic.slug}}">
                <span class="hover:underline hover:text-gray-900" v-text="post.topic.name"></span>
             </router-link> |
            3 hours ago
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            post:Object,
            required:true
        },
        name: "PostListItem",
    }
</script>

<style scoped>

</style>
