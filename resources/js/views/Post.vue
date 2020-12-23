<template>
    <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 mt-20">

        <div v-if="$apollo.queries.post.loading">
            Loading...
        </div>

        <div  v-else>

            <div class="text-lg text-gray-600">
                By {{ post.author.name }} in
                <router-link class="underline hover:text-black" :to="{name:'topic',params:{slug:post.topic.slug}}" v-text="post.topic.name"></router-link>
                | 3 hours ago
            </div>

            <h1 class="text-4xl mt-10 font-bold mb-12" v-text="post.title"></h1>

            <p class="text-gray-700 pb-3 mb-12 whitespace-pre-line" v-html="post.content"></p>

            <div class="mb-24 flex">
                <div class="mr-6">
                    <img class="w-16 h-16 rounded-full" :src="avatarPath" alt="Author avatar">
                </div>
                <div class="flex flex-col justify-center">
                    <div class="text-xl text-gray-600">Written by {{ post.author.name}}</div>
                    <div class="text-gray-600">Publiched in {{post.topic.name}} on May 19 2020 </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        name: "Post",
        apollo:{
            post: {
                query: gql`query ($id: ID!) {
                       post (id: $id) {
                         title
                         content
                         author{
                           id
                           name
                           avatarPath
                         }
                         topic{
                           name
                           slug
                         }
                       }
                    }`,
                variables() {
                    return {
                        id: this.$route.params.id
                    }
                }
            }
        },
        computed: {
            avatarPath(){
                return this.post.author.avatarPath
            }
        }
    }
</script>

<style scoped>

</style>
