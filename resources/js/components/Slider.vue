<template>
  <swiper class="swiper" :options="swiperOption">
    <swiper-slide v-for="(slide, index) in slides" :key="index">
        <a :href="`/${locale}/brand/${slide.id}`" class="w-full relative block mb-10">
            <img class="slide w-full object-cover" :src="slide.image['file_path'] || ''">
            <div class="absolute flex flex-col h-full items-center justify-center top-0 w-full">
                <h2 class="px-4 text-2xl text-yellow-500 font-extrabold text-shadow sm:text-4xl">{{ slide.title[locale] || '' }}</h2>
                <h5 class="px-4 mt-3 text-lg text-white font-bold text-shadow sm:text-2xl">{{ slide.description[locale] || '' }}</h5>
            </div>
        </a>
    </swiper-slide>
    <div class="swiper-pagination" slot="pagination"></div>
  </swiper>
</template>

<script>
    export default {
        props: ['slides', 'locale'],
        data() {
            return {
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
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

<style lang="scss" scoped>
    .slide {
        height: 700px;
    }

    @media only screen and (max-width: 600px) {
        .slide {
            height: 350px;
        }
    }
</style>
