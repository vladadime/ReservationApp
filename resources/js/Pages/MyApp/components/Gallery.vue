<template>
    <div class="flex flex-wrap w-full h-96 relative justify-center bg-gray-200">
        <div class="w-1/2 justify-center">
            <div v-for="(picture, index) in pictures" :key="index" class="absolute w-1/2 h-full">
                <transition name="fade">
                    <div v-if="currentSlide == index" style="height: 100%">
                        <img class="w-full h-full" :src="'/storage/' + picture.picture_url"/>
                    </div>
                </transition>
            </div>
            <div class="w-1/2">
                <div class="absolute bottom-0 flex w-1/2 justify-center">
                    <div v-for="(picture, index) in pictures" :key="picture" @click="makeActive(index)" :class="currentSlide == index ? 'bg-gray-700' : 'bg-gray-300' " class="w-4 h-4 mx-2 rounded-full cursor-pointer shadow-md"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['pictures'],
    data(){
        return{
            currentSlide: 0,
            interval: "",
            isTitleShowing: false,
        };
    },
    methods: {
        makeActive(index){
            this.currentSlide = index;
        }
    },
    mounted(){
        this.interval = setInterval(() => {
             this.currentSlide = this.currentSlide === this.$props.pictures.length - 1 ? 0 : this.currentSlide + 1;
        }, 4000);
    },
    beforeUnmount(){
        clearInterval(this.interval);
    }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 1s ease;
}

.fade-enter-from {
    opacity: 0;
    transform: translateX(-10%);
}
.fade-leave-to {
    opacity: 0;
    transform: translateX(10%);
}
</style>
