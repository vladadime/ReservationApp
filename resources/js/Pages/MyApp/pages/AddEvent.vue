<template>
    <div class="font-inherit h-full">
        <Layout/>
        <div class="relative w-full h-full flex flex-wrap justify-center mb-16 bg-gray-200">
            <div class="w-1/2 h-full bg-white">
                <div class="w-full h-20 flex">
                    <div class="w-full h-full bg-yellow-200 flex justify-center">
                        <p class="text-2xl self-center">Napravi dogadjaj</p>
                    </div>
                </div>
                <div class="flex flex-wrap h-full justify-center py-2 border border-gray shadow-lg mt-5">
                    <form class="w-3/4" action="/dodaj-dogadjaj" @submit.prevent="addEvent" enctype="multipart/form-data">
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Ime dogadjaja</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite ime dogadjaja" v-model="name" />
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Ime objekta</label>
                            <select class="text-sm w-64" v-model="facility_id">
                                <option value="" selected disabled>
                                    Izaberite objekat
                                </option>
                                <option :value="facility.id" v-for="facility in facilities" :key="facility">
                                    <p>{{ facility.name }}</p>
                                </option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Datum dogadjaja</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite datum dogadjaja" v-model="date" />
                        </div>
                        <div class="grid border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center mb-4">Opis dogadjaja</label>
                            <textarea class="text-sm resize-none" rows="5" cols="50" placeholder="Unesite opis" v-model="description"></textarea>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <button type="submit" class="bg-red-700 text-white rounded w-1/2 py-2 my-4">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Layout from '../layouts/Layout.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { Layout, Footer },
    props: ['facilities'],
    data() {
        return {
            name: '',
            description: '',
            facility_id: '',
            date: ''
        };
    },
    methods: {
        addEvent() {
            this.$inertia.post('/dodaj-dogadjaj', { name: this.name, date: this.date, description: this.description, facility_id: this.facility_id });

            this.name = '';
            this.date = '';
            this.description = '';
            this.facility_id = '';
        }
    }
}
</script>

<style>

</style>
