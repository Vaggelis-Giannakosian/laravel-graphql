<template>
    <div class="container mx-auto my-20 px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2">

        <h2 class="text-4xl">
            All Posts
        </h2>

        <p v-if="$apollo.queries.posts.loading">
            Loading...
        </p>
       <div v-else>
           <post class="mt-10 border rounded p-4 shadow-lg" v-for="(post,index) in posts.data" :post="post" :key="post.id"> </post>
       </div>
    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import PostListItem from "../components/PostListItem";

    export default {
        name: "PostList",
        components: {'post': PostListItem},
        apollo: {
            posts: gql`{
                posts (first:20) {
                    paginatorInfo{
                        total
                        perPage
                        currentPage
                        lastPage
                    }
                    data{
                        id
                        title
                        lead
                        author {
                          name
                        }
                        topic {
                           name
                        }
                    }
                 }
            }`,
            topics: gql`{
                topics{
                    id
                    name
                }
            }`
        }
    }
</script>

<style scoped>

</style>
