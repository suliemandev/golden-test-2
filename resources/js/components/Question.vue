<template>
    <div>
        {{ question.title[locale] }}

        <div class="mt-6">
            <x-button size="lg" :type="value == 'yes' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'yes')">نعم</x-button>
            <x-button size="lg" :type="value == 'no' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'no')">لا</x-button>
            <x-button size="lg" :type="value == 'maybe' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'maybe')">ربما</x-button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['question', 'locale'],

        data() {
            return {
                value: null,
            }
        },

        methods: {
            answerQuestion(question_id, answer) {
                this.value = answer;
                this.$emit('answerQuestion', {question_id, answer});
            },
        },
    }
</script>
