<template>
    <div class="h-full">
        <facility-layout>
            <div class="w-full h-full text-center justify-center" v-for="facility in typeOfObject" :key="facility.name">
                    <div>
                        <blog2 :picture="'/storage' + facility.profile_image" :name="facility.name" :url="'/objekat/' + facility.id"></blog2>
                    </div>
                </div>
        </facility-layout>
    </div>
</template>

<script>
import FacilityLayout from '../layouts/FacilityLayout.vue';
import Blog2 from '../components/Blog2.vue';

export default {
    components: { FacilityLayout, Blog2 },
    props: {
        typeOfObject: {
            clubs: {
                type: Array,
                required: false
            },
            taverns: {
                type: Array,
                required: false
            },
            restaurants: {
                type: Array,
                required: false
            },
            cafes: {
                type: Array,
                required: false
            },
            required: true
        }
    },
}
</script>

<style>

</style>
