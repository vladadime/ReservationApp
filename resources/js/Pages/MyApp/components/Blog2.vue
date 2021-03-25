<template>
    <div class="px-2 mt-10 text-left">
        <div class="text-base text-center">
            <a :href="url">
                <p>{{ name }}</p>
            </a>
        </div>
        <div class="my-2">
            <a :href="url">
                <img class="w-56 h-32" :src="picture" alt="12321"/>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['picture', 'name', 'url'],
}
</script>

<style>

</style>

