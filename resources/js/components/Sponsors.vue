<template>
    <swiper class="swiper" :options="swiperOption">
        <swiper-slide v-for="(sponsor, index) in sponsors" :key="'sponsor' + index">
            <div class="p-6 rounded-md flex items-center justify-center sm:h-44 mb-8">
                <img class="max-h-full" :src="sponsor">
            </div>
        </swiper-slide>
        <!-- <div class="swiper-pagination" slot="pagination"></div> -->
    </swiper>
</template>

<script>
    export default {
        props: ['locale', 'sponsors'],
        data() {
            return {
                swiperOption: {
                    slidesPerView: 'auto',
                    // spaceBetween: 20,

                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                }
            }
        }
    }
</script>

<style scoped>
    .slide {
        height: 700px;
        background-size: cover;
        background-position: center 40%;
    }

    .swiper-slide {
        width: 140px;
    }

    @media (min-width: 640px) { 
        .swiper-slide {
            width: 200px;
        }
    }

    @media (min-width: 768px) { 
        .swiper-slide {
            width: 30%;
        }
    }

    @media (min-width: 1024px) { 
        .swiper-slide {
            width: 33%;
        }
    }
</style>
