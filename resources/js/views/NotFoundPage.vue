<template>
    <div class="h-screen w-screen bg-gray-200 flex justify-center">
        <div class="text-center text-gray-600 self-center mb-20">
            <h1 class="text-6xl font-sans text-shadow">404</h1>
            <h3 class="text-4xl font-sans text-shadow">This page cannot be found</h3>
        </div>

        <div class="absolute bottom-0 mb-20 text-gray-600 text-center text-xl">
            <span class="opacity-50">Take me back to</span> <a href="#" class="border-b hover:underline" @click.prevent="$router.push({name:'index'})">the home page</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NotFoundPage"
    }
</script>

<style scoped>

</style>
