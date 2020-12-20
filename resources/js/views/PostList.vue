<template>
    <div>
       <ul>
           <li v-for="(post,index) in posts.data" v-text="post.title" :key="post.id"></li>
       </ul>
    </div>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        name: "PostList",
        data(){
            return {
                posts:{}
            }
        },
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
            }`
        }
    }
</script>

<style scoped>

</style>
