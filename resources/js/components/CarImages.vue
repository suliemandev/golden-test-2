<template>
    <swiper class="swiper" :options="swiperOption">
        <swiper-slide v-for="(slide, index) in slides" :key="'slide' + index">
            <img :src="slide.file_path" class="rounded-none md:rounded-lg w-full">
        </swiper-slide>

        <div class="swiper-pagination py-3 w-full" slot="pagination"></div>
    </swiper>
</template>

<script>
    export default {
        props: ['slides', 'locale'],
        data() {
            return {
                swiperOption: {
                    autoHeight: true,
                    // effect: 'cube',
                    grabCursor: true,
                    // cubeEffect: {
                    //     shadow: false,
                    //     slideShadows: false,
                    //     shadowOffset: 10,
                    //     shadowScale: 0.94
                    // },
                    pagination: {
                        el: '.swiper-pagination',
                        // dynamicBullets: false,
                        // clickable: true,
                    }
                }
            }
        },

        methods: {
            bg_image(image) {
                if(image) {
                    const path = image.file_path.replaceAll('\\', '/');
                    return path;
                }
                return '';
            }
        }
    }
</script>

<style scoped>
    .swiper {
        height: auto;
    }

    .swiper-pagination {
        position: relative;
        bottom: 0;
    }
</style>
