<section class="bg-gray-100">
	<div class="container mx-auto mt-10 p-4">
	  	<div>
		    <nav class="flex text-gray-700">
				<a 
					@click.prevent="activeTab = 'Requirements'" 
					href="#" 
					class="px-4 sm:px-6 py-3 font-medium sm:text-xl leading-7 rounded-md hover:text-black focus:outline-none focus:text-black"
					:class="{'bg-yellow-500 text-black' : activeTab == 'Requirements'}">
					{{ __('Requirements') }}
				</a>
				<a 
					@click.prevent="activeTab = 'How'" 
					href="#" 
					class="ms-4 px-4 sm:px-6  py-3 font-medium sm:text-xl leading-7 rounded-md hover:text-black focus:outline-none focus:text-black"
					:class="{'bg-yellow-500 text-black' : activeTab == 'How'}">
					{{ __('How to Rent?') }}
				</a>
		    </nav>
	  	</div>

		<section v-show="activeTab == 'How'" class="text-gray-700 body-font">
		    <div class="container px-4 py-8 sm:px-5 sm:py-24 mx-auto">
		        <div class="text-center mb-10 sm:mb-20">
		            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{ __('How to Rent?') }}</h1>
		            <div class="flex mt-6 justify-center">
		                <div class="w-16 h-1 rounded-full bg-yellow-500 inline-flex"></div>
		            </div>
		        </div>
		        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
		            <div class="p-4 md:w-1/3 mb-3 sm:mb-8 flex flex-col text-center items-center">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-10 dont-flip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Book Now/Request for booking') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">
								{{ __('You can book directly on our website & Complete the payment using the "Book now button" or you can contact us for a quotation.') }}
		                    </p>
		                </div>
		            </div>
		            <div class="p-4 md:w-1/3 mb-3 sm:mb-8 flex flex-col text-center items-center">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-8" fill="currentColor"  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 32 32" >
								<path  d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M16,4    c5.207,0,9.605,3.354,11.266,8H4.734C6.395,7.354,10.793,4,16,4z M16,18c-1.105,0-2-0.895-2-2s0.895-2,2-2s2,0.895,2,2    S17.105,18,16,18z M4,16c5.465,0,9.891,5.266,9.984,11.797C8.328,26.828,4,21.926,4,16z M18.016,27.797    C18.109,21.266,22.535,16,28,16C28,21.926,23.672,26.828,18.016,27.797z"/>
							</svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Car Delivery') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">{{ __('At the time of Delivery our team will contact you via WhatsApp/Call & Deliver the car to your Hotel/Airport. On spot, You will check the car, Sign the contract & receive the key.') }}</p>
		                </div>
		            </div>
		            <div class="p-4 md:w-1/3 mb-3 sm:mb-8 flex flex-col text-center items-center">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
		                    <svg class="w-10"  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Car Return') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">{{ __('When the rental period is over, our staff will contact you & send someone to collect the car.') }}</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>

		<section v-show="activeTab == 'Requirements'" class="text-gray-700 body-font">
		   	<div class="container px-4 py-8 sm:px-5 sm:py-24 mx-auto">
		        <div class="text-center mb-10 sm:mb-20">
		            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{ __('Requirements') }}</h1>
		            <div class="flex mt-6 justify-center">
		                <div class="w-16 h-1 rounded-full bg-yellow-500 inline-flex"></div>
		            </div>
		        </div>
		        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
		            <div class="p-4 md:w-1/4 mb-3 sm:mb-8 flex flex-col text-center items-center w-full">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Age') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">
								{{ __('Driver must be over 21 years old to drive normal cars & 23 for Sports cars.') }}
		                    </p>
		                </div>
		            </div>
		            <div class="p-4 md:w-1/4 mb-3 sm:mb-8 flex flex-col text-center items-center w-full">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-10 dont-flip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Valid Driving Licence') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">
								{{ __('Driver must have a valid driving Licence. We accept all Local driving licences of all countries.') }}
		                    </p>
		                </div>
		            </div>

		            <div class="p-4 md:w-1/4 mb-3 sm:mb-8 flex flex-col text-center items-center w-full">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Passport') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">
								{{ __('A Passport is required for Tourists. Emirates ID is required for Residents/Locals.') }}
		                    </p>
		                </div>
		            </div>

		            <div class="p-4 md:w-1/4 mb-3 sm:mb-8 flex flex-col text-center items-center w-full">
		                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-yellow-500 text-black mb-5 flex-shrink-0">
							<svg class="w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
		                </div>
		                <div class="flex-grow">
		                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ __('Credit Card or Deposit') }}</h2>
		                    <p class="leading-relaxed text-sm sm:text-base">
								{{ __('Security Deposit (Guarantee) is required by credit a card. Deposit will be blocked on your card for 21 days') }}
		                    </p>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>
</section>