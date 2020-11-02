<template>
    <nav class="bg-transparent relative w-full z-10">
        <div class="container mx-auto px-4">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 start-0 flex items-center lg:hidden">
                    <button @click="toggle"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                        aria-label="Main menu"
                        aria-expanded="false"
                    >
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center lg:items-stretch lg:justify-start">
                    <a href="/" class="flex-shrink-0">
                        <img class="block lg:hidden h-10 w-auto py-2" src="/images/logo.png" />
                        <img class="hidden lg:block h-10 w-auto py-2 pe-10" src="/images/logo-black.png" />
                    </a>
                    <div class="hidden lg:block lg:ms-6">
                        <div class="flex">
                            <a href="/" class="px-3 py-2 rounded-md font-medium leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                                {{ __('Home') }}
                            </a>

                            <a href="/about" class="ms-4 px-3 py-2 rounded-md font-medium leading-5 text-gray-800 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                                {{ __('About') }}
                            </a>
                            <a :href="`/${locale}/contact`" class="ms-4 px-3 py-2 rounded-md font-medium leading-5 text-gray-800 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                                {{ __('Contact') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 end-0 flex items-center lg:static lg:inset-auto lg:ms-6 lg:pe-0">
                    <dropdown align="end">
                        <template #trigger>
                            <button class="bg-white border-transparent duration-150 ease-in-out flex focus:bg-gray-700 focus:outline-none focus:text-white hover:text-black items-center justify-center rounded h-6 w-6 text-gray-800 transition me-1" aria-label="Locale">
                                {{ locale == 'ar' ? 'ע' : 'ع' }}
                            </button>
                        </template>
                        <template #content>
                            <div class="py-1">
                                <a v-if="locale != 'ar'" href="/ar" class="block px-4 py-2 text-sm leading-5 text-accents-7 hover:bg-accents-1 hover:text-black focus:outline-none focus:bg-accents-1 focus:text-black" role="menuitem">العربية</a>
                                <a v-if="locale != 'he'" href="/he" class="block px-4 py-2 text-sm leading-5 text-accents-7 hover:bg-accents-1 hover:text-black focus:outline-none focus:bg-accents-1 focus:text-black" role="menuitem">עברית</a>
                            </div>
                        </template>
                    </dropdown>
                </div>
            </div>
        </div>

        <div :class="{'max-h-screen': showMobileNavigation}" class="max-h-0 overflow-hidden transition-all duration-500 ease-out-in">
            <div class="px-2 pt-2 pb-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    {{ __('Home') }}
                </a>
                <a :href="`/${locale}/about`" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    {{ __('About') }}
                </a>
                <a :href="`/${locale}/contact`" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    {{ __('Contact') }}
                </a>
            </div>
        </div>

        <slide-over direction="start" :show="showListSlider" @close="showListSlider = false" maxWidth="xl">
            <slot></slot>
        </slide-over>
    </nav>
</template>

<script>
    export default {
        props: ['locale'],
        data() {
            return {
                showMobileNavigation: false,
                showListSlider: false,
            }
        },
        methods: {
            toggle() {
                this.showMobileNavigation = !this.showMobileNavigation;
            },
        }
    }
</script>
