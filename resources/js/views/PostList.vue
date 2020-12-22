<template>
    <div class="container mx-auto my-20 px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2">

        <h2 class="text-4xl">
            All Posts
        </h2>
        <div>Loading: {{ $apollo.loading }}</div>
        <div>Is posts loading: {{ $apollo.queries.posts.loading }}</div>

        <p v-if="$apollo.queries.posts.loading">
            Loading...
        </p>
       <ul v-else>
           <li v-for="(post,index) in posts.data" v-text="post.title" :key="post.id"></li>
       </ul>
    </div>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        name: "PostList",
        apollo: {
            posts: gql`{
                posts {
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
