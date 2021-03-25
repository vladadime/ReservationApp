<template>
    <div>
        <Layout />
        <div class="relative w-full flex flex-wrap justify-center bg-gray-200">
            <div class="w-1/2 bg-white mb-20">
                <div class="w-full py-1 h-20 flex">
                    <div class="w-full h-full bg-yellow-200">
                        <p class="text-2xl self-center ml-3 text-red-700">{{ facility.name }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="p-1 grid grid-cols-2" v-for="picture in pictures" :key="picture">
                        <div class="h-36 w-60 p-2 float-left">
                            <img class="h-full w-full" :src="'/storage/' + picture.picture_url" alt="sadasda">
                        </div>
                        <div class="w-1/2 flex justify-center self-center p-2 ml-2">
                            <base-button class="bg-red-700 text-white text-sm p-2 m-1 flex justify-center rounded-md" @click="deleteImage(picture.id)">IZBRIŠI SLIKU</base-button>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 flex justify-center self-center p-2 ml-2">
                    <base-button class="bg-red-700 text-white text-sm p-2 m-1 flex justify-center rounded-md" @click="addImage">DODAJ SLIKU</base-button>
                    <input type="file" v-on:change="onChange">
                </div>
                <Gallery :pictures="pictures"/>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Layout from '../layouts/Layout';
import Gallery from '../components/Gallery';
import Footer from '../components/Footer';
import BaseButton from '../UI/BaseButton';

export default {
    components: { Layout, Gallery, Footer, BaseButton },
    props: ['facility', 'pictures'],
    data() {
        return {
            facility_id: this.$props.facility.id,
            file: ''
        }
    },
    methods: {
        deleteImage(id) {
            this.$inertia.delete('/izbrisi-sliku/' + id);
        },
        addImage() {
            this.$inertia.post('/dodaj-sliku/', { facility_id: this.facility_id, file: this.file });
        },
        onChange(e) {
            this.file = e.target.files[0];
        }
    }
}
</script>

<style>

</style>

