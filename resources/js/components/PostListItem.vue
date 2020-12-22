<template>
    <div>
        <router-link :to="{name:'post', params:{id:post.id}}">
            <h4 class="hover:underline text-2xl pb-3 font-semibold" v-text="post.title"></h4>
        </router-link>
        <p  class="text-gray-600 pb-3" v-html="post.lead"></p>
        <div class="text-sm text-gray-600" v-text="writtenBy"></div>
    </div>
</template>

<script>
    export default {
        props:{
            post:Object,
            required:true
        },
        name: "PostListItem",
        computed:{
            writtenBy(){
                return `Written by ${this.post.author.name} in ${this.post.topic.name} category | 3 hours ago`;
            }
        }
    }
</script>

<style scoped>

</style>
