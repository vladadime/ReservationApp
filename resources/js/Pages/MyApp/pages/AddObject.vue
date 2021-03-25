<template>
    <div class="font-inherit h-full">
        <Layout/>
        <div class="relative w-full h-full flex flex-wrap justify-center mb-16 bg-gray-200">
            <div class="w-1/2 h-full bg-white">
                <div class="w-full h-20 flex">
                    <div class="w-full h-full bg-yellow-200 flex justify-center">
                        <p class="text-2xl self-center">Rezerviši online</p>
                    </div>
                </div>
                <div class="flex flex-wrap h-full justify-center py-2 border border-gray shadow-lg mt-5">
                    <form class="w-3/4" action="/dodaj" @submit.prevent="add" enctype="multipart/form-data">
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Ime objekta</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite ime objekta" v-model="name" />
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Izaberite tip objekta</label>
                            <select class="text-sm w-64" v-model="type">
                                <option value="" selected disabled>
                                    Izaberite tip objekta
                                </option>
                                <option :value="type.name" v-for="type in typesArr" :key="type.name">
                                    <p>{{ type.name }}</p>
                                </option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Broj mesta</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite broj mesta" v-model="num_seats" />
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Kontakt telefon</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite broj telefona" v-model="contact" />
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Radno vreme</label><br>
                            <div class="grid grid-rows-2 grid-cols-2 border-gray mt-5 justify-center">
                                <label>Radnim danima:</label>
                                <input class="text-sm w-64" type="text" placeholder="npr 08:00-22:00" v-model="info1" />
                                <label>Vikendom:</label>
                                <input class="text-sm w-64" type="text" placeholder="npr 08:00-02:00" v-model="info2" />
                            </div>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Adresa objekta</label>
                            <input class="text-sm w-64" type="text" placeholder="Unesite adresu" v-model="address" />
                        </div>
                        <div class="grid border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center mb-4">Opis objekta</label>
                            <textarea class="text-sm resize-none" rows="5" cols="50" placeholder="Unesite opis" v-model="description"></textarea>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center mb-4">Profilna slika objekta</label>
                            <input type="file" v-on:change="onChange">
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
    data() {
        return {
            typesArr: [
                {name:'kafana'}, {name: 'klub'}, {name: 'kafic'}, {name: 'restoran'}],
                name: '',
                type: '',
                num_seats: '',
                contact: '',
                info1: '',
                info2: '',
                address: '',
                description: '',
                file: ''
        };
    },
    methods: {
        add() {
            this.$inertia.post('/dodaj', { name: this.name, type: this.type, num_seats: this.num_seats, contact: this.contact, info1: this.info1, info2: this.info2, address: this.address, description: this.description, file: this.file });

            this.name = '';
            this.type = '';
            this.num_of_seats = '';
            this.contact = '';
            this.info1 = '';
            this.info2 = '';
            this.address = '';
            this.description = '';
            this.file = '';
        },
        onChange(e) {
            this.file = e.target.files[0];
        },
    }
}
</script>

<style>

</style>
