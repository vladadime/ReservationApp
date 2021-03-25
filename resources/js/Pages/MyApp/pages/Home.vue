<template>
    <div class="font-inherit">
        <Layout/>
        <gallery :pictures="pictures"></gallery>
        <Content :taverns="taverns" :clubs="clubs" :cafes="cafes" :restaurants="restaurants" :programs="programs"/>
        <Footer />
    </div>
</template>

<script>
import Layout from '../layouts/Layout.vue';
import NavBar from '../components/NavBar.vue';
import Gallery from '../components/Gallery.vue';
import Content from '../components/Content.vue';
import Footer from '../components/Footer.vue';

export default {
    components: { Layout, NavBar, Gallery, Content, Footer },
    props: ['taverns', 'clubs', 'cafes', 'restaurants', 'pictures', 'user', 'programs']
}
</script>

<style>

</style>
