<template>
    <div>
        <Layout />
        <div class="flex flex-wrap w-full h-16 justify-center">
            <div class="w-1/2 bg-red-700 flex justify-center rounded-md">
                <p class="text-2xl text-white self-center">{{ type }} u Nisu</p>
            </div>
        </div>
        <div class="flex flex-wrap w-full justify-center">
            <div class="grid grid-cols-4 h-full w-1/2 bg-gray-100 shadow-xl mb-10">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from '../layouts/Layout.vue';

export default {
    components: { Layout },
    inject: ['type']
}
</script>

<style>

</style>
