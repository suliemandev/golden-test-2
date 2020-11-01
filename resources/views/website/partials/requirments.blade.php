<section class="my-10 sm:my-20 container px-4 mx-auto flex flex-col lg:flex-row lg:flex-wrap">
    <div class="flex-1 sm:me-6 my-4 sm:my-8">
        <div class="mx-auto text-2xl font-semibold mb-6">{{ __('What are the requirments to rent cars in Dubai?') }}</div>
        
        <div @click="toggleQuestion('Driving Licence.')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Driving Licence.') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Driving Licence.'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Driving Licence. - answer') }}
            </dd>
        </div>

        <div @click="toggleQuestion('Passport')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Passport') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Passport'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Passport - answer') }}
            </dd>
        </div>

        <div @click="toggleQuestion('Credit Card')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Credit Card for the security deposit.') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Credit Card'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Credit Card for the security deposit. - answer') }}
            </dd>
        </div>

        <div @click="toggleQuestion('Minimum Age')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Minimum Age') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Minimum Age'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Minimum Age - answer') }}
            </dd>
        </div>

    </div>


    <div class="flex-1 sm:ms-6 my-4 sm:my-8">
        <div class="mx-auto text-2xl font-semibold mb-6">{{ __('Sport Car Rental Dubai - Procedure:') }}</div>
        
        <div @click="toggleQuestion('Requesting a Car.')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Requesting a Car.') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Requesting a Car.'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Requesting a Car. - answer') }}
            </dd>
        </div>

        <div @click="toggleQuestion('Reserving a car.')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Reserving a car.') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Reserving a car.'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Reserving a car. - answer') }}
            </dd>
        </div>

        <div @click="toggleQuestion('Receiving the car.')" class="question-and-answer select-none cursor-pointer border-2 my-3 px-6 py-4 rounded-lg text-sm group">
            <dt class="question">
                <div class="flex justify-between">
                    <div class="text-black font-semibold">
                        {{ __('Receiving the car.') }}
                    </div>
                    <div>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-black bg-yellow-500 rounded-full p-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                            </g>
                        </svg>
                        <svg fill="currentColor" class="question-chevron group-hover:bg-gray-500 h-5 block text-indigo-800 bg-gray-400 rounded-full p-1 hidden" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="currentColor" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g>
                            <polygon points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </dt>
            <dd v-show="activeQuestion == 'Receiving the car.'" class="answer mt-2 leading-snug text-gray-700">
                {{ __('Receiving the car. - answer') }}
            </dd>
        </div>
    </div>
</section>