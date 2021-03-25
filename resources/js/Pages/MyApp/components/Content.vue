<template>
    <div class="h-full w-full flex flex-wrap justify-center text-base p-2 text-center bg-gray-200">
        <div class="w-full justify-center flex flex-wrap bg-gray-200">
            <ul class="bg-red-700 rounded-md shadow-xl">
                <li class="inline m-0 p-3" v-for="num in 7" :key="num">
                    <base-button>
                        <p class="text-base">{{ currentWeekDay() + num - 2 > 6 ? days((currentWeekDay() + num - 2) - 7) : days(currentWeekDay() + num - 2) }}</p>
                        <p class="text-sm" v-if="(currentDay() + num - 1) > daysInMonth(currentMonth(), currentYear()) && (currentMonth() + 1) > 12">{{ currentDay() + num - daysInMonth(currentMonth(), currentYear()) - 1 + '. ' + month(1) }}</p>
                        <p class="text-sm" v-else-if="(currentDay() + num - 1) > daysInMonth(currentMonth(), currentYear())">{{ currentDay() + num - daysInMonth(currentMonth(), currentYear()) - 1 + '. ' + month(currentMonth() + 1) }}</p>
                        <p class="text-sm" v-else>{{ (currentDay() + num - 1) + '. ' + month(currentMonth()) }}</p>
                    </base-button>
                </li>
            </ul>
        </div>{{ date }}
        <div class="w-3/4 bg-gray-100 shadow-xl mb-10">
            <p>Dogadjaji u Nišu tog dana</p>
            <div class="flex justify-center">
                <p>Filter prikaza:</p>
                <form class="px-2 flex">
                    <div class="mx-2">
                        <input class="mx-1" type="checkbox" v-model="type1">
                        <label for="kafane">KAFANE</label>
                    </div>
                    <div class="mx-2">
                        <input class="mx-1" type="checkbox"  v-model="type2">
                        <label for="klubovi">KLUBOVI</label>
                    </div>
                    <div class="mx-2">
                        <input class="mx-1" type="checkbox" v-model="type3">
                        <label for="kafici">KAFICI & BAROVI</label>
                    </div>
                    <div class="mx-2">
                        <input class="mx-1" type="checkbox" v-model="type4">
                        <label for="restorani">RESTORANI</label>
                    </div>
                </form>
            </div>
            <div class="grid grid-cols-3 justify-center" >
                <div v-if="type1 === true" v-for="facility in taverns" :key="facility.id">
                    <blog :picture="'/storage' + facility.profile_image" :name="facility.name" :info="facility.info" :short-desc="facility.description" :contact="facility.contact" :url="'/objekat/' + facility.id"></blog>
                </div>
                <div v-if="type2 === true" v-for="facility in clubs" :key="facility.id">
                    <blog :picture="'/storage' + facility.profile_image" :name="facility.name" :info="facility.info" :short-desc="facility.description" :contact="facility.contact" :url="'/objekat/' + facility.id"></blog>
                </div>
                <div v-if="type3 === true" v-for="facility in cafes" :key="facility.id">
                    <blog :picture="'/storage' + facility.profile_image" :name="facility.name" :info="facility.info" :short-desc="facility.description" :contact="facility.contact" :url="'/objekat/' + facility.id"></blog>
                </div>
                <div v-if="type4 === true" v-for="facility in restaurants" :key="facility.id">
                    <blog :picture="'/storage' + facility.profile_image" :name="facility.name" :info="facility.info" :short-desc="facility.description" :contact="facility.contact" :url="'/objekat/' + facility.id"></blog>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Blog from './Blog.vue';
import NavBar from './NavBar.vue';
import BaseButton from '../UI/BaseButton.vue';

export default {
    components: { Blog, NavBar, BaseButton },
    props: ['facilities', 'taverns', 'clubs', 'cafes', 'restaurants', 'programs'],
    data () {
        return {
            type1: true,
            type2: true,
            type3: true,
            type4: true,
            currentDate: new Date(),
            navButtons: [{
                id: 0,
                name: 'PONEDELJAK'
            },
            {
                id: 1,
                name: 'UTORAK'
            },
            {
                id: 2,
                name: 'SREDA'
            },
            {
                id: 3,
                name: 'ČETVRTAK'
            },
            {
                id: 4,
                name: 'PETAK'
            },
            {
                id: 5,
                name: 'SUBOTA'
            },
            {
                id: 6,
                name: 'NEDELJA'
            },
            ],
        }
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
        daysInMonth(currentMonth, currentYear){
            return new Date(currentYear, currentMonth, 0).getDate();
        },
        days(idx) {
            return this.navButtons[idx].name;
        },
        month(currentMonth) {
            switch(currentMonth) {
                case 1:
                    return 'januar';
                    break;
                case 2:
                    return 'februar';
                    break;
                case 3:
                    return 'mart';
                    break;
                case 4:
                    return 'april';
                    break;
                case 5:
                    return 'maj';
                    break;
                case 6:
                    return 'jun';
                    break;
                case 7:
                    return 'jul';
                    break;
                case 8:
                    return 'avgust';
                    break;
                case 9:
                    return 'septembar';
                    break;
                case 10:
                    return 'oktobar';
                    break;
                case 11:
                    return 'novembar';
                    break;
                case 12:
                    return 'decembar';
                    break;
            }
        }
    }
}
</script>

<style scoped>
input[type = "checkbox"]:focus {
    outline: 0px;
    -webkit-appearance:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    color: black;
}
</style>
