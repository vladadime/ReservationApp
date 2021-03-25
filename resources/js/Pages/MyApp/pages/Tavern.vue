<template>
    <div class="bg-gray-200 h-screen">
        <list-of-facilities :typeOfObject="taverns"></list-of-facilities>
        <Footer />
    </div>
</template>

<script>
import ListOfFacilities from '../components/ListOfFacilities.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { ListOfFacilities, Footer },
    props: ['taverns'],
    provide() {
        return {
            type: 'Kafane',
        }
    },
}
</script>

<style>

</style>
