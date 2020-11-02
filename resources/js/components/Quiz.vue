<template>
    <div id="quiz">
        <div class="-mt-16 bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky top-0 z-20 rounded-t-xl">
            <div @click="answerAll">
            الاختبار الذهبي
            </div>
            <div class="flex">
                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-500 ms-2"></div>
                <div class="w-3 h-3 rounded-full bg-red-500 ms-2"></div>
            </div>
        </div>

        <swiper 
            ref="mySwiper" 
            class="swiper" 
            :options="swiperOption"
            @transitionStart="handleSwiperReadied"
        >
            <swiper-slide>
                <div v-show="!showForm" class="p-5 text-5xl py-36 text-center font-semibold text-gray-900 flex flex-col h-92">
                    <div>
                    ابدأ الاختبار
                    </div>

                    <div class="mt-6">
                        <x-button size="lg" type="secoundry" @clicked="displayForm">ابدأ الاختبار</x-button>
                    </div>
                </div>
                <div v-show="showForm" class="p-5 py-10 font-semibold text-gray-900 flex flex-col">
                    <div class="text-2xl">
                    ادخل بياناتك
                    </div>

                    <form action="#" @submit.prevent="submitForm">
                        <div class="py-6">
                            <div class="mb-4 lg:mb-6">
                                <label for="name" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['name'] }"
                                    >{{ __('Full name') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input v-model="form.name" 
                                        class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['name'] }"
                                        name="name" id="name" ref="name">
                                </div>

                                <div v-if="errors['name']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['name'][0] }}
                                </div>
                            </div>

                            <div class="mb-4 lg:mb-6">
                                <label for="email" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['email'] }"
                                    >{{ __('Email') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input v-model="form.email" 
                                        class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['email'] }"
                                        name="email" type="email" id="email">
                                </div>
                                <div v-if="errors['email']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['email'][0] }}
                                </div>
                            </div>

                            <div class="mb-4 lg:mb-6">
                                <label for="phone" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['phone'] }"
                                    >{{ __('Phone') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input v-model="form.phone" 
                                        class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['phone'] }"
                                        name="phone" id="phone">
                                </div>
                                <div v-if="errors['phone']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['phone'][0] }}
                                </div>
                            </div>

                            <div class="mb-4 lg:mb-6">
                                <label for="address" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['address'] }"
                                    >{{ __('Address') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input v-model="form.address" 
                                        class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['address'] }"
                                        name="address" id="address">
                                </div>
                                <div v-if="errors['address']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['address'][0] }}
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex items-center justify-center">
                        <x-button full size="lg" type="primary" @clicked="submitForm" :disabled="formSubmitLoading">
                            ابدأ الاختبار

                            <svg v-show="formSubmitLoading" class="animate-spin ms-2 me-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>
                    </div>
                </div>
            </swiper-slide>


            <swiper-slide v-if="locale" v-for="question in questions" :key="question.id" >
                <div class="p-5 py-36 h-92">
                    <question 
                        :question="question" 
                        :locale="locale" 
                        :is-active="activeQuestion && activeQuestion.id == question.id" 
                        @answerQuestion="answerQuestion"
                    />
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="p-5 text-xl py-36 text-center font-semibold flex flex-col h-92 text-gray-500">
                    يتم معالجة البيانات
                    <sweetalert-icon :icon="quizSubmitStatus" />
                </div>
            </swiper-slide>


            <swiper-slide>
                <div class="p-5 py-12 text-center font-semibold flex flex-col h-92 text-gray-500">
                    <div class="text-xl">
                    النتيجة
                    </div>

                    <div class="w-full mt-6 px-4" v-if="barChartData">
                        <bar-chart :data="barChartData" :key="chartRefresher" class="h-52"></bar-chart>
                    </div>

                    <div class="flex flex-col lg:flex-row mt-6 px-4" v-if="pieChartData">
                        <div class="lg:w-1/4 mb-6 w-full lg:me-10 mt-6">
                            <pie-chart :data="pieChartData" :key="chartRefresher"></pie-chart>
                        </div>
                        <div class="w-full lg:w-3/4 ">
                            <table class="table-auto w-full" v-if="result">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-start">{{ __('Subject') }}</th>
                                        <th class="px-4 py-2 text-center w-20">{{ __('Points') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(trend, index) in result.trends" 

                                    :class="{
                                        'bg-gray-100 ': index % 2 == 0,
                                        'bg-green-100': index < 3,
                                        'bg-opacity-50': index == 1,
                                    }">
                                        <td class="border px-4 py-2 text-start">{{ trend.title[locale] }}</td>
                                        <td class="border px-4 py-2 text-center w-20">{{ trend.points }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </swiper-slide>

            <div v-show="activeQuestionIndex >= 0" class="swiper-pagination" slot="pagination"></div>
        </swiper>

        <div v-if="activeQuestionIndex >= 0 && activeQuestionIndex < questions.length" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <div>
                <x-button @clicked="prevQuestion" type="secoundry">الخلف</x-button>
            </div>
            <div>
                سؤال {{ activeQuestionIndex + 1 }}/{{ questions.length }}
            </div>
            <div :class="{'opacity-50': !answers[activeQuestion.id]}">
                <x-button :disabled="!answers[activeQuestion.id]" @clicked="nextQuestion" type="secoundry">التالي</x-button>
            </div>
        </div>

        <div v-else-if="activeQuestionIndex >= 0 && false" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <div>
                <x-button @clicked="swiper.slidePrev()" type="secoundry">الخلف</x-button>
            </div>
        </div>

    </div>
</template>

<script>
import PieChart from './PieChart';
import BarChart from './BarChart';

export default {
    components: {
        PieChart, BarChart
    },

    data() {
        return {
            locale: false,
            questions: [],
            answers: {},
            api_token: null,

            form: {
                name: '1',
                email: '1@1.com',
                phone: '1234567890',
                address: 'address',
            },

            showForm: false,
            activeQuestion: null,
            activeQuestionIndex: -1,
            errors: [],
            result: null,
            pieChartData: null,
            barChartData: null,

            swiperOption: {
                autoHeight: true,
                allowTouchMove: false,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'progressbar'
                },
            },

            formSubmitLoading: false,
            quizSubmitStatus: 'loading',
            chartRefresher: 0,
        }
    },

    created() {
        this.locale = window.locale;
        this.fetchData();
    },

    mounted() {
        let result = [
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
            { points: 0, title: ''},
        ];

        this.setChartsData(result);
    },

    methods: {
        handleSwiperReadied() {
            this.activeQuestionIndex = this.swiper.realIndex - 1;
            this.activeQuestion = this.questions[this.activeQuestionIndex];

            // Calculate result;
            if (this.activeQuestionIndex == this.questions.length) this.submitQuiz();
        },

        fetchData() {
          axios.get("/questions/json")
            .then((response) => {
                this.questions = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },

        answerQuestion(data) {
            this.$set(this.answers, data.question_id, data.answer)

            setTimeout(() => {
                this.$nextTick(() => {
                    this.swiper.slideNext()
                });
            }, 200) 
        },

        displayForm() {
            this.showForm = true;
            this.$nextTick(() => {
                this.$refs.name.focus();
            })
        },

        submitForm() {
            this.formSubmitLoading = true;

            axios.post(`${locale}/client`,  this.form).then(response => {

                setTimeout(() => {
                    this.formSubmitLoading = false;
                    setTimeout(() => this.swiper.slideNext(), 100);
                    this.api_token = response.data.api_token
                }, 500);
            }).catch(error => {
                this.errors = error.response.data.errors;
                this.formSubmitLoading = false;
            });

        },

        nextQuestion() {
            this.swiper.slideNext();
        },

        prevQuestion() {
            this.swiper.slidePrev();
        },

        submitQuiz() {
            this.quizSubmitStatus = 'loading';

            axios.post(`${locale}/quiz`, { answers: this.answers }).then(response => {
                this.result = response.data;

                setTimeout(() => {
                    this.quizSubmitStatus = 'success'
                    setTimeout(() => {
                        this.setChartsData(this.result.trends);
                        this.swiper.slideNext();
                    }, 1200);
                }, 1200);
            });
        },

        answerAll() {
            this.questions.forEach(question => {
                const answers = ['yes' , 'no', 'maybe']
                this.answers[question.id] = answers[this.getRandomInt(3)];
            })

            this.swiper.slideTo(this.questions.length + 1);
        },

        setChartsData(result) {
            var top3 = result.slice(0, 3);
            var top10 = result.slice(0, 10);

            this.pieChartData = {
                datasets: [{
                    data: top3.map(trend => trend.points),
                    backgroundColor: [
                        '#F56565',
                        '#ED8936',
                        '#ECC94B',
                        '#48BB78',
                        '#4299E1',
                    ],
                    label: 'Dataset 1'
                }],
                labels: top3.map(trend => trend.title[this.locale])
            }

            this.barChartData = {
                datasets: [{
                    data: top10.map(trend => trend.points),
                    backgroundColor: [
                        '#F56565',
                        '#ED8936',
                        '#ECC94B',
                        '#48BB78',
                        '#4299E1',
                    ],
                    label: 'Dataset 1'
                }],
                labels: top10.map(trend => trend.title[this.locale])
            }

            this.chartRefresher++;
        },

        getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        }
    },

    computed: {
        swiper() {
            return this.$refs.mySwiper.$swiper
        },
    },
}
</script>

<style type="text/css">
    .sa-loading, .sa-info::before {
        left: 0 !important;
        top: 0 !important;
    }
</style>
