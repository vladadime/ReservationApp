<template>
    <div class="text-center relative h-full">
        <div class="w-full bg-red-700">
            <ul>
                <li class="inline m-0 p-2" v-for="button in navButtons" :key="button">
                    <a :href="button.url">
                        <base-button>{{ button.name }}</base-button>
                    </a>
                </li>
                <li v-if="$page.props.user && $page.props.user.role" class="inline m-0 p-2">
                    <a href="http://127.0.0.1:8000/rezervacije">
                        <base-button>REZERVACIJE</base-button>
                    </a>
                </li>
                <li v-if="$page.props.user && $page.props.user.role === 'admin'" class="inline m-0 p-2">
                    <a href="http://127.0.0.1:8000/dodaj">
                        <base-button>DODAJ OBJEKAT</base-button>
                    </a>
                </li>
                <li v-if="$page.props.user && $page.props.user.role === 'admin'" class="inline m-0 p-2">
                    <a href="http://127.0.0.1:8000/dodaj-dogadjaj">
                        <base-button>NAPRAVI DOGADJAJ</base-button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import BaseButton from '../UI/BaseButton.vue';

export default {
    components: { BaseButton },
    props: ['user'],
    data() {
        return {
            navButtons: [{
                id: 1,
                name: 'POČETNA',
                url: 'http://127.0.0.1:8000/'
            },
            {
                id: 2,
                name: 'KAFANE',
                url: 'http://127.0.0.1:8000/kafane'
            },
            {
                id: 3,
                name: 'KLUBOVI',
                url: 'http://127.0.0.1:8000/klubovi'
            },
            {
                id: 4,
                name: 'KAFIĆI & BAROVI',
                url: 'http://127.0.0.1:8000/kafici'
            },
            {
                id: 5,
                name: 'RESTORANI',
                url: 'http://127.0.0.1:8000/restorani'
            },
            ],
        };
    },

};
</script>

<style scoped>

</style>
