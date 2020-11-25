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

        <swiper v-if="show"
            ref="mySwiper" 
            class="swiper" 
            :options="swiperOption"
            @transitionStart="handleSwiperReadied">

            <swiper-slide>
                <div class="p-5 text-5xl py-36 text-center font-semibold text-gray-900 flex flex-col h-92">
                    <div>
                    ابدأ الاختبار
                    </div>

                    <div class="mt-6">
                        <x-button size="lg" type="secoundry" @clicked="swiper.slideNext(); page = 'video'">ابدأ الاختبار</x-button>
                    </div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <iframe class="w-full h-96" src="https://www.youtube.com/embed/mppfDNsR6yI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;"></iframe>
            </swiper-slide>

            <swiper-slide>
                <div class="p-5 py-10 font-semibold text-gray-900 flex flex-col">
                    <div class="text-2xl">
                        ادخل بياناتك
                    </div>

                    <form @submit.prevent="submitForm" class="py-6 swiper-no-swiping">
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
                                <input v-model="form.phone" type="tel"
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

                        <div class="mb-4 lg:mb-6">
                            <label for="birth_year" 
                                class="block text-sm font-medium leading-5 text-gray-700"
                                :class="{'text-red-500' : errors['birth_year'] }"
                                >{{ __('Birth year') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="form.birth_year" 
                                    type="number"
                                    class="form-input block w-full sm:text-sm sm:leading-5 h-10" 
                                    :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : errors['birth_year'] }"
                                    name="birth_year" id="birth_year">
                            </div>

                            <div v-if="errors['birth_year']" class="mt-1 text-red-600 text-sm">
                                {{ errors['birth_year'][0] }}
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-4 lg:mb-6">
                            <div class="w-full mb-4 sm:mb-0 sm:w-1/2">
                                <label for="math_units" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['math_units'] }"
                                    >{{ __('Math Units') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select v-model="form.math_units" id="math_units" class="h-10 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option :value="null">اختر</option>
                                        <option :value="3">3</option>
                                        <option :value="4">4</option>
                                        <option :value="5">5</option>
                                    </select>
                                </div>
                                <div v-if="errors['math_units']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['math_units'][0] }}
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2 sm:ms-3">
                                <label for="english_units" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['english_units'] }"
                                    >{{ __('English Units') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select v-model="form.english_units" id="math_units" class="h-10 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option :value="null">اختر</option>
                                        <option :value="3">3</option>
                                        <option :value="4">4</option>
                                        <option :value="5">5</option>
                                    </select>
                                </div>
                                <div v-if="errors['english_units']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['english_units'][0] }}
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row">
                            <div class="w-full mb-4 sm:mb-0  sm:w-1/2">
                                <label for="psychometric" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['psychometric'] }"
                                    >{{ __('Psychometric') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select v-model="form.psychometric" id="psychometric" class="h-10 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option :value="null">اختر</option>
                                        <option value="Yes">{{ __('Yes') }}</option>
                                        <option value="In the future">{{ __('In the future') }}</option>
                                        <option value="I do not want">{{ __('I do not want') }}</option>
                                        <option value="I do not know">{{ __('I do not know') }}</option>
                                    </select>
                                </div>
                                <div v-if="errors['psychometric']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['psychometric'][0] }}
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2 sm:ms-3">
                                <label for="study_abroad" 
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    :class="{'text-red-500' : errors['study_abroad'] }"
                                    >{{ __('Study abroad') }}
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select v-model="form.study_abroad" id="math_units" class="h-10 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option :value="null">اختر</option>
                                        <option value="Yes">{{ __('Yes') }}</option>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Maybe">{{ __('Maybe') }}</option>
                                    </select>
                                </div>
                                <div v-if="errors['study_abroad']" class="mt-1 text-red-600 text-sm">
                                    {{ errors['study_abroad'][0] }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </swiper-slide>

            <swiper-slide>
                <questions 
                    ref="questions"
                    :questions="questions" 
                    :locale="locale"
                    @answerQuestion="answerQuestion"
                    :key="page"
                    @activeQuestionChange="activeQuestionChange">    
                </questions>
            </swiper-slide>   

            <swiper-slide>
                <div class="p-5 text-xl py-36 text-center font-semibold flex flex-col h-92 text-gray-500">
                    <div>يتم معالجة البيانات</div>
                    <sweetalert-icon :icon="quizSubmitStatus" />

                    <div class="mt-10">برعاية:</div>
                    <div class="flex items-center justify-center mt-5">
                        <img class="h-12" src="/sponsors/2.png">
                    </div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="p-5 py-12 text-center font-semibold flex flex-col h-92 text-gray-500">
                    <div class="text-xl">
                        النتيجة
                    </div>

                    <div class="w-full mt-6" v-if="barChartData">
                        <bar-chart :data="barChartData" :key="chartRefresher" class="h-52"></bar-chart>
                    </div>

                    <div class="flex mt-6" v-if="result">
                        <div class="flex flex-1 flex-col">
                            <div v-for="(trend, index) in result.trends" class="mb-6">
                                <div class="font-bold mb-3 text-gray-900 text-md text-start flex justify-between items-center">
                                    {{ trend.title[locale] }}

                                    <div class="flex items-center">
                                        <div class="me-2 text-gray-600 text-xs">{{ __('Points') }}</div>
                                        <div
                                            :class="index < 3 ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-500'"
                                             class="px-3 py-1 rounded-full text-sm">
                                            {{ getPointPercentage(trend.points) }}%
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap mt-3" v-if="index < 3">
                                    <div v-for="profession in trend.professions" class="h-20 p-1 w-1/3">
                                        <div class="bg-gray-100 flex h-full items-center justify-center p-2 rounded text-xs">
                                            {{ profession.title[locale] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="text-4xl text-center font-semibold text-gray-900 p-5 py-36 h-92">
                    هل ساعدك الاختبار بالتوجيه الاكاديمي؟

                    <div class="mt-6">
                        <x-button size="lg" :type="form.helped == 'yes' ? 'primary' : 'secoundry'" @clicked="form.helped = 'yes'; swiper.slideNext(); page = 'expectations'">
                            نعم
                        </x-button>
                        <x-button size="lg" :type="form.helped == 'maybe' ? 'primary' : 'secoundry'" @clicked="form.helped = 'maybe'; swiper.slideNext(); page = 'expectations'">
                            نص/نص
                        </x-button>
                        <x-button size="lg" :type="form.helped == 'no' ? 'primary' : 'secoundry'" @clicked="form.helped = 'no'; swiper.slideNext(); page = 'expectations'">
                            كلا
                        </x-button>
                    </div>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="text-4xl text-center font-semibold text-gray-900 p-5 py-36 h-92">
                    هل كانت النتائج ملائمة لتوقعاتك وميولك الاكاديمية؟

                    <div class="mt-6">
                        <x-button size="lg" :type="form.expectations == 'yes' ? 'primary' : 'secoundry'" @clicked="form.expectations = 'yes'; page = 'feedback'; swiper.slideNext();">
                            نعم
                        </x-button>
                        <x-button size="lg" :type="form.expectations == 'maybe' ? 'primary' : 'secoundry'" @clicked="form.expectations = 'maybe';  page = 'feedback'; swiper.slideNext();">
                            نص/نص
                        </x-button>
                        <x-button size="lg" :type="form.expectations == 'no' ? 'primary' : 'secoundry'" @clicked="form.expectations = 'no';  page = 'feedback'; swiper.slideNext();">
                            كلا
                        </x-button>
                    </div>
                </div>
            </swiper-slide>



            <swiper-slide>
                <div class="text-4xl text-center font-semibold text-gray-900 p-5 py-36 h-92">
                    <sweetalert-icon :icon="feedbackSubmitStatus" />
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="text-4xl text-center font-semibold text-gray-900 p-5 py-36 h-92">
                    تم الارسال بنجاح، شكرا لك :)
                </div>
            </swiper-slide>
        </swiper>

        <!-- video footer -->
        <div v-if="page == 'video'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <x-button @clicked="swiper.slidePrev(); page = 'welcome'" type="secoundry">الخلف</x-button>
            <x-button @clicked="swiper.slideNext(); page = 'form'" type="secoundry">التالي</x-button>
        </div>

        <!-- form footer -->
        <div v-if="page == 'form'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <x-button @clicked="swiper.slidePrev(); $scrollTo('#quiz'); page = 'video'" type="secoundry">الخلف</x-button>
            
            <x-button @clicked="submitForm" type="secoundry" :disabled="formSubmitLoading">
                <svg v-show="formSubmitLoading" class="animate-spin -ms-1 me-3 h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                التالي
            </x-button>
        </div>

        <!-- questions footer -->
        <div v-if="page == 'questions'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <div>
                <x-button @clicked="prevQuestion" type="secoundry">الخلف</x-button>
            </div>
            <div>
                سؤال {{ activeQuestionIndex + 1 }}/{{ questions.length }}
            </div>
            <div :key="activeQuestionIndex" :class="{'opacity-50': nextQuestionDisabled()}">
                <x-button :disabled="nextQuestionDisabled()" @clicked="nextQuestion" type="secoundry">
                    التالي
                </x-button>
            </div>
        </div>

        <!-- Result footer -->
        <div v-if="page == 'result'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <x-button @clicked="resetQuiz" type="secoundry">اعادة الاختبار</x-button>
            <x-button @clicked="swiper.slideNext(); page = 'helped'; $scrollTo('#quiz');" type="secoundry">انهاء</x-button>
        </div>

        <!-- Helped footer -->
        <div v-if="page == 'helped'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <x-button @clicked="swiper.slidePrev(); page = 'result';" type="secoundry">الخلف</x-button>
            <x-button 
                :class="{'opacity-50': form.helped == null}" 
                :disabled="form.helped == null" 
                @clicked="swiper.slideNext(); page = 'expectations';" type="secoundry">
                التالي
            </x-button>
        </div>

        <!-- Expectations footer -->
        <div v-if="page == 'expectations'" class="bg-gray-100 px-6 py-5 text-gray-700 flex justify-between items-center sticky bottom-0 z-10 rounded-b-xl">
            <x-button @clicked="swiper.slidePrev(); page = 'helped';" type="secoundry">الخلف</x-button>
            <x-button 
                :class="{'opacity-50': form.expectations == null}" 
                :disabled="form.expectations == null" 
                @clicked="page = 'feedback'; swiper.slideNext();" type="secoundry">
                ارسال
            </x-button>
        </div>
    </div>
</template>

<script>
import BarChart from './BarChart';

export default {
    components: {
        BarChart
    },

    data() {
        return {
            show: false,
            page: 'welcome',
            locale: false,
            questions: [],
            answers: {},
            api_token: null,

            form: {
                name: '',
                email: '',
                phone: '',
                address: '',
                birth_year: null,
                math_units: null,
                english_units: null,
                psychometric: null,
                study_abroad: null,
                expectations: null,
                helped: null,
            },

            activeQuestionIndex: 0,

            errors: [],
            result: null,
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
            feedbackSubmitStatus: 'loading',
            chartRefresher: 0,
        }
    },

    created() {
        this.locale = window.locale;
        this.fetchData();
    },

    mounted() {
        this.show = true;

        this.$bus.$on('slideToVideo', () => {
            this.swiper.slideTo(1);
            this.page = 'video';
            this.activeQuestionIndex = 0;
        });

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
            if (this.page == 'loading') this.submitQuiz();
            if (this.page == 'feedback') this.submitFeedback();
        },

        fetchData() {
            axios.get("/questions/json")
                .then((response) => {
                    this.questions = response.data;
                    this.show  = true;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        answerQuestion(data) {
            this.$set(this.answers, data.question_id, data.answer)
            this.nextQuestion();
        },

        submitForm() {
            this.formSubmitLoading = true;

            axios.post(`${locale}/client`,  this.form).then(response => {
                setTimeout(() => {
                    this.errors = [];
                    this.formSubmitLoading = false;
                    this.swiper.slideNext();
                    this.api_token = response.data.api_token
                    this.$scrollTo('#quiz');
                    this.page = 'questions';
                }, 200);
            }).catch(error => {
                this.errors = error.response.data.errors;
                this.formSubmitLoading = false;
            });
        },

        nextQuestion() {
            if (this.activeQuestionIndex < this.questions.length - 1) this.$refs.questions.next();
            else {
                this.page = 'loading';
                this.swiper.slideNext();
            }
        },

        prevQuestion() {
            if (this.activeQuestionIndex > 0) this.$refs.questions.prev();
            else {
                this.swiper.slidePrev();
                this.page = 'form';
            }
        },

        nextQuestionDisabled() {
            if (this.activeQuestionIndex == this.questions.length - 1) return true;

            if (this.questions[this.activeQuestionIndex]) {
                let activeQuestion = this.questions[this.activeQuestionIndex];
                if (!this.answers[activeQuestion.id]) return true;
            }

            return false;
        },

        activeQuestionChange(index) {
            this.activeQuestionIndex = index;
        },

        submitQuiz() {
            this.quizSubmitStatus = 'loading';

            axios.post(`${locale}/quiz`, { answers: this.answers }).then(response => {
                this.result = response.data;
                this.quizSubmitStatus = 'success';

                setTimeout(() => {
                    this.setChartsData(this.result.trends);
                    this.page = 'result';
                    this.swiper.slideNext();
                }, 1200);
            });
        },

        resetQuiz() {
            this.answers = {};
            this.activeQuestionIndex = 0;
            this.page = 'questions';
            this.swiper.slideTo(3);
        },

        getPointPercentage(points) {
            return this.result ? Math.round((points / this.result.trends[0].points) * 100 - 2) : 0;
        },

        setChartsData(result) {
            var top10 = result.slice(0, 10);

            this.barChartData = {
                datasets: [{
                    data: top10.map(trend => this.getPointPercentage(trend.points)),
                    backgroundColor: [
                        '#F56565',
                        '#ED8936',
                        '#ECC94B',
                        '#48BB78',
                        '#4299E1',
                    ],
                    label: '%'
                }],
                labels: top10.map(trend => trend.title[this.locale])
            }

            this.chartRefresher++;
        },

        getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        },

        submitFeedback() {
            this.feedbackSubmitStatus = 'loading';

            setTimeout(()  => {
                axios.post(`${locale}/feedback`,  this.form).then(response => {
                    this.feedbackSubmitStatus = 'success';

                    setTimeout(() => {
                        this.page = 'thanks';
                        this.swiper.slideNext();
                    }, 1200);
                });
            }, 2000)
        },

        answerAll() {
            // this.questions.forEach(question => {
            //     const answers = ['yes' , 'no', 'maybe']
            //     this.$set(this.answers, question.id, answers[this.getRandomInt(3)])
            // })

            // this.activeQuestionIndex = this.questions.length - 1;
        },
    },

    computed: {
        swiper() {
            return this.$refs.mySwiper.$swiper
        },

        top3trends() {
            return this.result ? this.result.trends.slice(0, 3) : [];
        }
    },
}
</script>

<style type="text/css">
    .sa-loading, .sa-info::before {
        left: 0 !important;
        top: 0 !important;
    }
</style>
