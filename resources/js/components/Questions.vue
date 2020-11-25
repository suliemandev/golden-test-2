<template>
    <div>
        <div v-for="(question, index) in questions" :key="question.id">
            <transition name="slide-left" mode="out-in">
                <question 
                    v-show="activeQuestion == index && show"
                    :question="question" 
                    :locale="locale" 
                    @answerQuestion="answerQuestion"
                />
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['questions', 'locale'],

        data() {
            return {
                show: true,
                activeQuestion: 0,
            }
        },

        methods: {
            answerQuestion(data) {
                this.$emit('answerQuestion', data);
            },

            next() {
                this.show = false;
                this.activeQuestion++;
                this.$emit('activeQuestionChange', this.activeQuestion);

                setTimeout(() => {    
                    this.show = true;
                }, 300)
            },

            prev() {
                this.show = false;
                setTimeout(() => {
                    this.activeQuestion--;
                    this.show = true;
                    this.$emit('activeQuestionChange', this.activeQuestion);
                }, 300)
            }
        },
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .2s ease;
    }
    .fade-enter, .fade-leave-active {
      opacity: 0;
    }

    .slide-left-enter-active {
        transition: all .2s ease;
    }

    .slide-left-leave-active {
        transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-left-enter, .slide-left-leave-to {
      transform: translateX(-20px);
      opacity: 0;
    }

    .slide-right-enter-active {
        transition: all .2s ease;
    }

    .slide-right-leave-active {
        transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-right-enter, .slide-right-leave-to {
      transform: translateX(20px);
      opacity: 0;
    }
</style>
