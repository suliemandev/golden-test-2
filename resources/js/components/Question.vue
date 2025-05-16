<template>
    <div class="flex flex-col font-semibold h-96 justify-center p-5 text-3xl text-center">
        {{ question.title[locale] }}

        <div class="mt-6">
            <x-button size="lg" :type="value == 'yes' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'yes')">
                {{ __('Yes') }}
            </x-button>
            <x-button size="lg" :type="value == 'maybe' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'maybe')">
                {{ __('Maybe') }}
            </x-button>
            <x-button size="lg" :type="value == 'no' ? 'primary' : 'secoundry'" @clicked="answerQuestion(question.id, 'no')">
                {{ __('No') }}
            </x-button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['question', 'locale'],

        data() {
            return {
                value: null,
                disabled: false,
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
