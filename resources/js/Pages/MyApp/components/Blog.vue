<template>
    <div class="px-10 mt-10 text-left">
        <div class="my-4">
            <a :href="url">
                <img class="w-80 h-64" :src="picture" alt="12321"/>
            </a>
        </div>
        <div class="font-bold text-lg">
            <a :href="url">
                <p>{{ name }}</p>
            </a>
        </div>
        <div class="text-red-600">
            <p>{{ info }}</p>
        </div>
        <div>
            <p>{{ shortDesc }}</p>
        </div>
        <div class="my-2 text-blue-300">
            <p>{{ contact }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['picture', 'name', 'short-desc', 'info', 'contact', 'url'],
}
</script>

<style>

</style>

