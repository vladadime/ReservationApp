<template>
    <div class="bg-gray-200 h-screen">
        <list-of-facilities :typeOfObject="clubs"></list-of-facilities>
        <Footer />
    </div>
</template>

<script>
import ListOfFacilities from '../components/ListOfFacilities.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { ListOfFacilities, Footer },
    props: ['clubs'],
    provide() {
        return {
            type: 'Klubovi'
        }
    },
}
</script>

<style>

</style>

