<template>
    <div class="container mx-auto my-20 px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2">

        <div v-if="$apollo.queries.user.loading">
            Loading...
        </div>

        <div v-else>

            <h2 class="text-4xl">
                <router-link class="text-gray-500 hover:underline" :to="{name:'index'}">
                    All Posts
                </router-link>
                <span class="text-gray-600">/</span>
                {{ user.name }}
            </h2>

            <post class="mt-10 border rounded p-4 shadow-lg" v-for="(post,index) in user.posts" :post="post" :key="post.id"> </post>

        </div>


    </div>
</template>


<script>
    import gql from 'graphql-tag';
    import PostListItem from "../components/PostListItem";

    export default {
        name: "AuthorPostList",
        components:{
            'post':PostListItem
        },
        apollo: {
            user: {
                query: gql` query($id: ID!){
                            user(id: $id){
                              id
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
                        id: this.$route.params.id
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
