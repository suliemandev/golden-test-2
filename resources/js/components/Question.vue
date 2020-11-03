<template>
    <div class="text-4xl text-center font-semibold text-gray-900">
        {{ question.title[locale] }}

        <div class="mt-6">
            <x-button size="lg" :type="value == 'yes' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'yes')">نعم</x-button>
            <x-button size="lg" :type="value == 'maybe' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'maybe')">نص/نص</x-button>
            <x-button size="lg" :type="value == 'no' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'no')">كلا</x-button>
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
