<template>
    <div class="font-inherit h-screen">
        <Layout/>
        <div class="relative w-full h-full flex flex-wrap justify-center mb-16 bg-gray-200">
            <div class="w-1/2 h-full bg-white">
                <div class="w-full h-20 flex">
                    <div class="w-full h-full bg-yellow-200 flex justify-center">
                        <p class="text-2xl self-center">Rezerviši online</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center py-2 border border-gray shadow-lg mt-5">
                    <form class="w-1/2" action="/rezervacije" @submit.prevent="reserve">
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Datum rezervacije</label>
                            <select class="text-sm w-56" v-model="day">
                                <option value="" disabled selected>
                                    Izaberite dan rezervacije
                                </option>
                                <option :value="currDate(currentDay() + num - 1, currentMonth(), currentYear())" v-for="num in 7" :key="num">
                                    <p>{{ currentWeekDay() + num - 2 > 6 ? days((currentWeekDay() + num - 2) - 7) + ' ' : days((currentWeekDay() + num - 2)) + ' ' }}</p>
                                    <p v-if="currDate(currentDay() + num - 1, currentMonth(), currentYear())">{{ currDate(currentDay() + num - 1, currentMonth(), currentYear()) }}</p>
                                </option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Tip lokala</label>
                            <select class="text-sm w-56" v-model="type" :disabled="day ? false : true">
                                <option value="" disabled selected>
                                    Izaberite tip lokala
                                </option>
                                <option :value="type.name" v-for="type in typesArr" :key="type.name">
                                    <p>{{ type.name }}</p>
                                </option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Klub/Kafana/Caffe&Bar/Restoran</label>
                            <select class="text-sm w-56" v-model="facility" :disabled="type ? false : true">
                                <option value="" disabled selected>
                                    Izaberite ponudjeni lokal
                                </option>
                                <option v-if="type === 'kafana'" :value="facility.id" v-for="facility in taverns" :key="facility.id">
                                    {{ facility.name }}
                                </option>
                                <option v-if="type === 'kafic'" :value="facility.id" v-for="facility in cafes" :key="facility.id">
                                    {{ facility.name }}
                                </option>
                                <option v-if="type === 'klub'" :value="facility.id" v-for="facility in clubs" :key="facility.id">
                                    {{ facility.name }}
                                </option>
                                <option v-if="type === 'restoran'" :value="facility.id" v-for="facility in restaurants" :key="facility.id">
                                    {{ facility.name }}
                                </option>
                            </select>
                        </div>
                        <div class="grid grid-rows-2 border-gray border shadow-lg mt-5 justify-center">
                            <label class="text-center">Broj mesta</label>
                            <select class="text-sm w-56" v-model="num_of_seats" :disabled="facility ? false : true">
                                <option value="" disabled selected>
                                    Izaberite broj mesta
                                </option>
                                <option :value="num" v-for="num in 10" :key="num">
                                    <p>{{ num }}</p>
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            <button type="submit" class="bg-red-700 text-white rounded w-1/2 py-2 my-4">Rezerviši</button>
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
import BaseButton from '../UI/BaseButton.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { Layout, BaseButton, Footer },
    props: ['taverns', 'clubs', 'cafes', 'restaurants', 'user'],
    data() {
        return {
            currentDate: new Date(),
            daysArr: [
                {name:'ponedeljak'}, {name: 'utorak'}, {name: 'sreda'}, {name: 'četvrtak'}, {name: 'petak'}, {name: 'subota'}, {name: 'nedelja'}],
            typesArr: [
                {name:'kafana'}, {name: 'klub'}, {name: 'kafic'}, {name: 'restoran'}],
                type: '',
                day: '',
                facility: '',
                num_of_seats: '',
        };
    },
    methods: {
        currentDay() {
            var currentDay = this.currentDate.toLocaleString('en-US', { day: 'numeric' });
            return parseInt(currentDay);
        },
        currentWeekDay() {
            var currentWeekDay = this.currentDate.toLocaleString('en-US', { weekday: 'long' });
            switch(currentWeekDay){
                case 'Monday':
                    return 1;
                    break;
                case 'Tuesday':
                    return 2;
                    break;
                case 'Wednesday':
                    return 3;
                    break;
                case 'Thursday':
                    return 4;
                    break;
                case 'Friday':
                    return 5;
                    break;
                case 'Saturday':
                    return 6;
                    break;
                case 'Sunday':
                    return 7;
                    break;
            }
        },
        currentMonth() {
            var currentMonth = this.currentDate.toLocaleString('en-US', { month: 'numeric' });
            return parseInt(currentMonth);
        },
        currentYear() {
            var currentYear = this.currentDate.toLocaleString('en-US', { year: 'numeric' });
            return parseInt(currentYear);
        },
        daysInMonth(currentMonth, currentYear) {
            return new Date(currentYear, currentMonth, 0).getDate();
        },
        days(idx) {
            return this.daysArr[idx].name;
        },
        dateString(currentDay, currentMonth, currentYear) {
            return currentDay + '.' + currentMonth + '.' + currentYear;
        },
        currDate(currentDay, currentMonth, currentYear) {
            var daysInMonth = new Date(currentYear, currentMonth, 0).getDate();
            if(currentDay > daysInMonth && currentMonth + 1 > 12)
                return currentDay - daysInMonth + '.1.' + (currentYear + 1) + '.';
            else if(currentDay > daysInMonth)
                return currentDay - daysInMonth + '.' + (currentMonth + 1) + '.' + currentYear;
            else
                return currentDay + '.' + currentMonth + '.' + currentYear + '.';
        },
        reserve() {
            this.$inertia.post('/rezervacije', { user_id: this.$props.user.id, facility_id: this.facility, num_of_seats: this.num_of_seats, reservation_day: this.day });

            this.day = '';
            this.type = '';
            this.facility = '';
            this.num_of_seats = '';
        }
    }
}
</script>

<style>

</style>
