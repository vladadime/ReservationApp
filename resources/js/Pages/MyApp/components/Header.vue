<template>
    <div class="relative h-28 w-full p-2 text-center bg-red-700">
        <p class="text-white text-2xl">ProvediSe.com</p>
        <div class="hidden absolute top-0 right-0 px-6 py-4 sm:block">
            <form v-if="$page.props.user" method="POST" @submit.prevent="logout">
                <button class="text-white focus:outline-none">
                    Odjavi se
                </button>
            </form>
            <template v-else>
                <inertia-link :href="route('login')" class="text-md text-white">
                    Prijavi se
                </inertia-link>
                <inertia-link :href="route('register')" class="ml-4 text-md text-white">
                    Registruj se
                </inertia-link>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
            canLogin: Boolean,
            canRegister: Boolean,
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat+Subrayada:wght@400;700&display=swap');

p {
    font-family: 'Montserrat Subrayada', sans-serif;
}
</style>
