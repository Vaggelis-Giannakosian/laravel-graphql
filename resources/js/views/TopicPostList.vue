<template>
    <div class="container mx-auto my-20 px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2">

        <div v-if="$apollo.queries.topic.loading">
            Loading...
        </div>

        <div v-else>

            <h2 class="text-4xl">
                <router-link class="text-gray-500 hover:underline" :to="{name:'index'}">
                    All Posts
                </router-link>
                <span class="text-gray-600">/</span>
                {{ topic.name }}
            </h2>

            <post class="mt-10 border rounded p-4 shadow-lg" v-for="(post,index) in topic.posts" :post="post" :key="post.id"> </post>

        </div>


    </div>
</template>

<script>
    import gql from 'graphql-tag';
    import PostListItem from "../components/PostListItem";

    export default {
        name: "TopicPostList",
        components:{
            'post':PostListItem
        },
        computed:{
            topicHeader(){
                return this.topic.name;
            }
        },
        apollo: {
            topic: {
                query: gql` query($slug: String!){
                            topic(slug: $slug){
                              name
                              posts {
                                id
                                title
                                lead
                                created_at
                                author{
                                  id
                                  name
                                }
                                topic{
                                  name
                                  slug
                                }
                              }
                            }
                        }`,
                variables(){
                    return {
                        slug: this.$route.params.slug
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
