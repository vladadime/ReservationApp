<template>
    <div>
        <Layout />
        <div class="relative w-full flex flex-wrap justify-center bg-gray-200">
            <div class="w-3/4 mb-20 justify-center">
                <div class="w-full py-1 h-20 flex justify-center">
                    <div class="w-full h-full bg-yellow-200">
                        <p class="text-2xl self-center ml-3 text-red-700">{{ facility[0].name }} - {{ facility[0].info }}</p>
                    </div>
                </div>
                <div class="w-full bg-white p-1">
                    <div class="h-36 w-60 float-left p-2">
                        <img class="h-full w-full" :src="'/storage' + facility[0].profile_image" alt="sadasda">
                    </div>
                    <div>
                        <p>{{ facility[0].description }}</p>
                        <p>{{ facility[0].description }}</p>
                        <p>{{ facility[0].description }}</p>
                        <p>{{ facility[0].description }}</p>
                        <p>{{ facility[0].description }}</p>
                    </div>
                </div>
                <Gallery :pictures="pictures"/>
                <div v-if="$page.props.user && $page.props.user.role === 'admin'" class="w-full h-16 flex flex-wrap justify-center bg-gray-200">
                    <a :href="'http://127.0.0.1:8000/izmeni/' + facility[0].id">
                        <base-button class="bg-red-700 text-white p-4 m-1  flex self-center rounded-md">IZMENI OBJEKAT</base-button>
                    </a>
                    <a :href="'http://127.0.0.1:8000/izmeni-galeriju/' + facility[0].id">
                        <base-button class="bg-red-700 text-white p-4 mt-1 flex self-center rounded-md">IZMENI GALERIJU</base-button>
                    </a>
                    <a href="http://127.0.0.1:8000/">
                        <base-button class="bg-red-700 text-white p-4 mt-1 flex self-center rounded-md ml-1" @click="deleteFacility">IZBRIŠI OBJEKAT</base-button>
                    </a>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Layout from '../layouts/Layout';
import Gallery from '../components/Gallery';
import Footer from '../components/Footer';

export default {
    components: { Layout, Gallery, Footer },
    props: ['facility', 'pictures'],
    methods: {
        deleteFacility() {
            this.$inertia.delete('/izbrisi/' + this.$props.facility[0].id);
        }
    }
}
</script>

<style>

</style>

