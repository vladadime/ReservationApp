<template>
    <div class="bg-gray-200 h-screen">
        <list-of-facilities :typeOfObject="restaurants"></list-of-facilities>
        <Footer />
    </div>
</template>

<script>
import ListOfFacilities from '../components/ListOfFacilities.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { ListOfFacilities, Footer },
    props: ['restaurants'],
    provide() {
        return {
            type: 'Restorani'
        }
    },
}
</script>

<style>

</style>

