<template>
    <div>
        <router-link :to="{name:'post', params:{id:post.id}}">
            <h4 class="hover:underline text-2xl pb-3 font-semibold" v-text="post.title"></h4>
        </router-link>
        <p  class="text-gray-600 pb-3" v-html="post.lead"></p>
        <div class="text-sm text-gray-600">
            Written by
            <router-link :to="{name:'author',params:{id:post.author.id}}" class="hover:underline hover:text-gray-900" v-text="post.author.name"></router-link>
            in
            <router-link class="hover:underline hover:text-gray-900" :to="{name:'topic', params:{slug: post.topic.slug}}" v-text="post.topic.name">
             </router-link> |

            {{ timeago }}

        </div>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        props:{
            post:Object,
            required:true
        },
        name: "PostListItem",
        computed:{
            timeago(){
                return moment(this.post.created_at).fromNow()
            }
        }
    }
</script>

<style scoped>

</style>
