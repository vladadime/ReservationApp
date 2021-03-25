<template>
    <div>
        <Layout/>
        <jet-authentication-card>
            <jet-validation-errors class="mb-4" />
            <form @submit.prevent="submit">
                <div>
                    <jet-label for="name" value="Ime" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <jet-label for="email" value="Email" />
                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                </div>
                <div class="mt-4">
                    <jet-label for="password" value="Lozinka" />
                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <jet-label for="password_confirmation" value="Potvrda lozinke" />
                    <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <jet-label for="contact_number" value="Broj telefona" />
                    <jet-input id="contact_number" type="text" class="mt-1 block w-full" v-model="form.contact" required/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Već ste registrovani ?
                    </inertia-link>

                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Registruj se
                    </jet-button>
                </div>
            </form>
        </jet-authentication-card>
        <Footer />
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox"
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import Layout from '../MyApp/layouts/Layout.vue'
    import Footer from '../MyApp/components/Footer.vue'

    export default {
        components: {
            JetAuthenticationCard,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Layout,
            Footer
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    contact: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
