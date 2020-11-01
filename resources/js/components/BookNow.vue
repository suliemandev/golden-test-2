<template>
    <modal :show="show" @close="close">
        <h4 class="z-10 bg-white font-bold px-4 py-5 shadow sticky text-lg top-0 rounded-t-lg">{{ __('Book Now') }}</h4>
        
        <nav class="mt-3 md:mt-6 px-3" v-if="isReady">
            <ul class="flex" :key="refresher">
                <li class="flex-1 me-4">
                    <!-- Completed Step -->
                    <a @click="swiper.slideTo(0, 300, false); refresher++" :class="{'border-yellow-500' : swiper.activeIndex == 0}" href="#" class="group py-2 block border-gray-200 hover:border-yellow-600 transition ease-in-out duration-150 md:ps-0 md:pt-4 border-s-0 border-b-4">
                        <h3 :class="{'text-yellow-500' : swiper.activeIndex == 0}" class="text-xs leading-4 text-gray-500 font-semibold uppercase group-hover:text-yellow-600 transition ease-in-out duration-150">{{ __('Step 1') }}</h3>
                        <p class="text-sm leading-5 font-medium mt-1">{{ __('Booking details') }}</p>
                    </a>
                </li>

                <li class="flex-1 me-4">
                    <!-- Current Step -->
                    <a @click="swiper.activeIndex > 0 ? swiper.slideTo(1, 300, false) : null; refresher++" :class="{'border-yellow-500' : swiper.activeIndex == 1}" href="#" class="group py-2 block border-gray-200 hover:border-yellow-600 transition ease-in-out duration-150 md:ps-0 md:pt-4 border-s-0 border-b-4">
                        <h3 :class="{'text-yellow-500' : swiper.activeIndex == 1}" class="text-xs leading-4 text-gray-500 font-semibold uppercase group-hover:text-yellow-600 transition ease-in-out duration-150">{{ __('Step 2') }}</h3>
                        <p class="text-sm leading-5 font-medium mt-1">{{ __('Payment') }}</p>
                    </a>
                </li>

                <li class="flex-1">
                    <!-- Current Step -->
                    <a @click="swiper.activeIndex > 1 ? swiper.slideTo(2, 300, false) : null; refresher++" :class="{'border-yellow-500' : swiper.activeIndex == 2}" href="#" class="group py-2 block border-gray-200 hover:border-yellow-600 transition ease-in-out duration-150 md:ps-0 md:pt-4 border-s-0 border-b-4">
                        <h3 :class="{'text-yellow-500' : swiper.activeIndex == 2}" class="text-xs leading-4 text-gray-500 font-semibold uppercase group-hover:text-yellow-600 transition ease-in-out duration-150">{{ __('Step 3') }}</h3>
                        <p class="text-sm leading-5 font-medium mt-1">{{ __('Order details') }}</p>
                    </a>
                </li>
            </ul>
        </nav>

        <swiper 
            ref="mySwiper" 
            class="swiper" 
            :options="swiperOption"
        >

            <swiper-slide>
                <form action="#" @submit.prevent="getOrderIframe">
                    <div class="px-4 py-6">
                        <div class="mb-3 lg:mb-6">
                            <label for="name" 
                                class="block text-sm font-medium leading-5 text-gray-700"
                                :class="{'text-red-500' : errors['name'] }"
                                >{{ __('Full name') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="orderDetails.name" 
                                    class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                    :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['name'] }"
                                    name="name" id="name">
                            </div>

                            <div v-if="errors['name']" class="mt-1 text-red-600 text-sm">
                                {{ errors['name'][0] }}
                            </div>
                        </div>

                        <div class="mb-3 lg:mb-6">
                            <label for="email" 
                                class="block text-sm font-medium leading-5 text-gray-700"
                                :class="{'text-red-500' : errors['email'] }"
                                >{{ __('Email') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="orderDetails.email" 
                                    class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                    :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['email'] }"
                                    name="email" type="email" id="email">
                            </div>
                            <div v-if="errors['email']" class="mt-1 text-red-600 text-sm">
                                {{ errors['email'][0] }}
                            </div>
                        </div>

                        <div class="mb-3 lg:mb-6">
                            <label for="phone" 
                                class="block text-sm font-medium leading-5 text-gray-700"
                                :class="{'text-red-500' : errors['phone'] }"
                                >{{ __('Phone') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="orderDetails.phone" 
                                    class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                    :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['phone'] }"
                                    name="phone" id="phone">
                            </div>
                            <div v-if="errors['phone']" class="mt-1 text-red-600 text-sm">
                                {{ errors['phone'][0] }}
                            </div>
                        </div>

                        <div class="mb-3 lg:mb-6">
                            <label for="dates" 
                                class="block text-sm font-medium leading-5 text-gray-700"
                                :class="{'text-red-500' : errors['dates'] }"
                                >{{ __('Booking Date') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <flat-pickr  
                                    :config="flatPickrconfig"
                                    v-model="orderDetails.dates"
                                    @on-change="calculatePrice"
                                    class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                    :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['dates'] }"
                                    name="dates" 
                                    id="dates"
                                />
                            </div>
                            <div v-if="errors['dates']" class="mt-1 text-red-600 text-sm">
                                {{ errors['dates'][0] }}
                            </div>
                        </div>


                        <div class="mb-3 lg:mb-6" v-if="orderDetails.days > 0">
                            <label for="total_price" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Full Price') }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="form-input block w-full sm:text-sm sm:leading-5 h-10">
                                    ₪{{ orderDetails.total_price }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white bottom-0 flex justify-between px-4 py-3 shadow sticky border-t border-gray-200 rounded-b-lg items-center">
                        <div class="pe-3">
                            <div v-if="orderDetails.days > 0">
                                <div class="text-gray-800">
                                    {{ __('For reservations, 20% of the total price must be paid') }}: 
                                    <span class="font-semibold text-black">
                                        ₪{{ ((orderDetails.total_price * 20) / 100).toFixed(2) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button key="activeBookingStep0" @click.prevent="getOrderIframe" class="flex text-white bg-yellow-500 border-0 py-3 px-8 focus:outline-none hover:bg-yellow-600 rounded">
                            <svg v-show="getIframButtonLoader" class="animate-spin -ms-1 me-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            {{ __('Next') }}
                        </button>
                    </div>
                </form>
            </swiper-slide>

            <swiper-slide>
                <iframe v-if="paymentIframeSrc" class="w-full" :src="paymentIframeSrc" style="height: 1100px"></iframe>
            </swiper-slide>

            <swiper-slide>
                <div class="flex flex-col items-center justify-center py-6 px-4">
                    <template v-if="orderSuccess">
                        <h3 class="text-lg text-center">{{ __('Payment Success') }}</h3>
                        <sweetalert-icon :key="swiper.activeIndex" icon="success" />

                        <div class="flex flex-row w-full mb-2">
                            <svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            {{ __('Order ID') }}
                            <span class="text-black mx-1 font-semibold">{{ orderSuccess.id }}</span> 
                        </div>
                        <div class="flex flex-row w-full mb-2">
                            <svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ __('From Date') }}
                            <span class="text-black mx-1 font-semibold">{{ orderSuccess.data[product.id]['date_from'] }}</span> 
                        </div>
                        <div class="flex flex-row w-full mb-2">
                            <svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ __('To Date') }}
                            <span class="text-black mx-1 font-semibold">{{ orderSuccess.data[product.id]['date_to'] }}</span> 
                        </div>
                    </template>

                    <template v-if="orderError" class="w-full">
                        <h3 class="text-lg text-center">{{ __('Payment Error') }}</h3>
                        <sweetalert-icon  :key="swiper.activeIndex" icon="error" />
                        
                        <div class="flex flex-row w-full mb-2">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500 me-2"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                            order id
                            <span class="text-black mx-1 font-semibold">{{ orderSuccess.id }}</span> 
                        </div>
                    </template>
                </div>

                <div class="bg-white bottom-0 flex justify-between px-4 py-3 shadow sticky border-t border-gray-200 rounded-b-lg">
                    <button key="done" @click="close" class="w-full text-gray-600 bg-gray-100 border-0 py-3 px-8 focus:outline-none hover:bg-gray-400 rounded">
                        {{ __('Done') }}
                    </button>
                </div>
            </swiper-slide>
        </swiper>   
    </modal>

</template>

<script>
    import { Arabic } from 'flatpickr/dist/l10n/ar.js';
    import { Hebrew } from 'flatpickr/dist/l10n/he.js';

    Hebrew.rangeSeparator = " - ";

    export default {
        props: ['show', 'product'],

        data() {
            return {
                isReady: false,
                refresher: 0,

                orderDetails: {
                    dates: null,
                    from_date: null,
                    to_date: null,
                    total_price: 0.00,
                    days: 0,
                    name: '',
                    phone: '',
                    email: '',
                },

                orderSuccess: null,
                orderError: null,

                errors: [],

                getIframButtonLoader: false,
                paymentIframeSrc: '',

                flatPickrconfig: {
                    dateFormat: 'Y/m/d',
                    locale: window.locale == 'ar' ? Arabic : window.locale == 'he' ? Hebrew : null,
                    minDate: 'today',
                    mode: 'range',
                },

                swiperOption: {
                    autoHeight: true,
                    allowTouchMove: false,
                }
            }
        },

        mounted() {
            this.$nextTick(() => this.onSwiperReady());

            window.swipeToSuccess = (order) => {
                this.orderSuccess = order;
                this.orderError = null;
                this.swiper.slideNext();
                this.refresher++;
            }

            window.swipeToError = (order) => {
                this.orderError = order;
                this.orderSuccess = null;
                this.swiper.slideNext();
                this.refresher++;
            }
        },

        methods: {
            close() {
                this.$emit('close');
            },

            getOrderIframe() {
                this.getIframButtonLoader = true;

                axios.post(`/${window.locale}/payments/get-iframe`, {
                    ...this.orderDetails,
                    product_id: this.product.id
                }).then(response => {
                    this.errors = [];
                    this.paymentIframeSrc = null;

                    setTimeout(() => {
                        this.paymentIframeSrc = response.data.url;
                        this.swiper.slideNext();
                        this.refresher++;
                    }, 200);
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.getIframButtonLoader = false;
                }).then(() => {
                    this.getIframButtonLoader = false;
                });
            },

            orderStatus() {
                this.swiper.slideNext();
                this.refresher++;
            },

            back() {
                this.swiper.slidePrev();
                this.refresher++;
            },

            onSwiperReady() {
                this.isReady = true;
            },

            calculatePrice() {
                let dates = this.orderDetails.dates;

                if(!dates) {
                    this.orderDetails.total_price = 0.00;
                    return;
                };

                let dates_array = dates.split(' - ');

                this.orderDetails.from_date = dates_array[0];
                if(dates_array.length == 2) this.orderDetails.to_date = dates_array[1];
                else this.orderDetails.to_date = dates_array[0]; //same day

                var Difference_In_Time = new Date(this.orderDetails.to_date).getTime() - new Date(this.orderDetails.from_date).getTime(); 
                // To calculate the no. of days between two dates 
                var Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24)) + 1; 

                this.orderDetails.days = Difference_In_Days;
                this.orderDetails.total_price = (this.orderDetails.days  * this.product.price).toFixed(2); 
            }
        },

        computed: {
            swiper() {
                return this.$refs.mySwiper.$swiper
            }
        },
    }
</script>

<style scoped>
    .swiper {
        height: auto;
    }
</style>
