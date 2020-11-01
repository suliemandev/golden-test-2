<template>
    <portal to="modals">
        <transition leave-active-class="duration-200">
            <div v-show="show" class="fixed z-50 inset-0 overflow-y-auto">
                <div class="flex min-h-full items-end sm:items-center justify-center">
                    <transition enter-active-class="ease-out duration-300"
                            enter-class="opacity-0"
                            enter-to-class="opacity-100"
                            leave-active-class="ease-in duration-200"
                            leave-class="opacity-100"
                            leave-to-class="opacity-0">
                        <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                        </div>
                    </transition>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
                    
                    <transition
                        enter-active-class="ease-out duration-300"
                        enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                        leave-active-class="ease-in duration-200"
                        leave-class="opacity-100 translate-y-0 sm:scale-100"
                        leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <div
                            v-show="show"
                            class="bg-white mt-16 sm:mb-16 rounded-lg shadow-xl transform transition-all w-full"
                            role="dialog"
                            aria-modal="true"
                            aria-labelledby="modal-headline"
                            :class="maxWidthClass"
                        >
                            <slot></slot>
                        </div>
                    </transition>
                </div>
            </div>
        </transition>
    </portal>
</template>

<script>
    export default {
        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                if (this.closeable) {
                    this.$emit('close')
                }
            }
        },

        watch: {
            show: {
                immediate: true,
                handler: (show) => {
                    if (show) {
                        document.body.style.overflow = 'hidden'
                    } else {
                        document.body.style.overflow = null
                    }
                }
            }
        },

        created() {
            const closeOnEscape = (e) => {
                if (e.key === 'Escape' && this.show) {
                    this.close()
                }
            }

            document.addEventListener('keydown', closeOnEscape)

            this.$once('hook:destroyed', () => {
                document.removeEventListener('keydown', closeOnEscape)
            })
        },

        computed: {
            maxWidthClass() {
                return {
                    'sm': 'sm:max-w-sm',
                    'md': 'sm:max-w-md',
                    'lg': 'sm:max-w-lg',
                    'xl': 'sm:max-w-xl',
                    '2xl': 'sm:max-w-2xl',
                    '4xl': 'sm:max-w-4xl',
                }[this.maxWidth]
            }
        }
    }
</script>
