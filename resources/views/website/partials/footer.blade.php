@php
	$icon = '
		<svg class="me-1 h-4 w-4 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150" x-description="Heroicon name: chart-bar" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
		</svg>
	'
@endphp

<section class="bg-gray-100">
	<div class="container mx-auto p-4 py-8 flex justify-between flex-wrap">
		<div class="lg:w-1/4">
			<div class="text-xl font-bold">{{ __('About') }}</div>
			<p class="mt-3 mb-6">{{ __('About Content') }}</p>
		</div>

		<div class="w-1/2 sm:w-1/4">
			<div class="text-xl font-bold">{{ __('Quick Links') }}</div>
			
			<nav class="mt-3 flex-1 space-y-1">
			    <a
			        href="/"
			        class="group flex items-center py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150"
			    >
			    	{!! $icon !!}

			        {{ __('Home') }}
			    </a>
			    
			    <a
			        href="/{{$locale}}/contact"
			        class="group flex items-center py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150"
			    >
			    	{!! $icon !!}

			        {{ __('Contact') }}
			    </a>
			    {{-- <a
			        href="/{{$locale}}/terms-conditions"
			        class="group flex items-center py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150"
			    >
			    	{!! $icon !!}

			        {{ __('Terms & Conditions') }}
			    </a>
			    <a
					href="/{{$locale}}/privacy-policy"
			        class="group flex items-center py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150"
			    >
			    	{!! $icon !!}

			        {{ __('Privacy Policy') }}
			    </a> --}}
			</nav>
		</div>


		<div class="w-1/2 sm:w-1/4">
			<div class="text-xl font-bold">{{ __('Follow Us') }}</div>
			<div class="mt-3 flex">
				<a href="/" class="bg-blue-600 text-white h-12 w-12 rounded-md p-3 me-2 hover:text-blue-600 hover:bg-black">
					<svg class="dont-flip" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
				</a>

				<a href="/" class="bg-blue-600 text-white h-12 w-12 rounded-md p-3 me-2 hover:text-blue-600 hover:bg-black">
					<svg class="dont-flip" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
						<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
					</svg>
				</a>
			</div>
		</div>
	</div>

	<div class="container mx-auto px-4 py-6">
		<hr>

		<div class="flex flex-col items-center justify-between mt-3 sm:flex-row text-center ">
			<div>
    			<img src="/images/logo-black.png" class="h-6">
    		</div>

			<div class="text-gray-500 mb-3 text-sm mt-2">©GoldenTest {{ date('Y') }}. All Rights Reserved.</div>
		</div>
	</div>

	<a href="https://averotech.com/" class="flex items-center justify-center pb-10 text-gray-400 hover:text-blue-600">
		<div class="me-2 text-xs font-sans mt-px">By Averotech</div>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30" width="20" height="20" class="fill-current cursor-pointer tracking-wide hover:opacity-100" style="isolation: isolate; transition: opacity 0.4s linear 0s;"><path d=" M 15 0 L 15 0 C 23.279 0 30 6.721 30 15 L 30 27.75 C 30 28.992 28.992 30 27.75 30 L 15 30 C 6.721 30 0 23.279 0 15 L 0 15 C 0 6.721 6.721 0 15 0 Z  M 25 25 L 15 25 C 12.35 25 9.8 23.95 7.93 22.07 C 6.05 20.2 5 17.65 5 15 C 5 12.35 6.05 9.8 7.93 7.93 C 9.8 6.05 12.35 5 15 5 C 17.65 5 20.2 6.05 22.07 7.93 C 23.95 9.8 25 12.35 25 15 L 25 25 Z " fill-rule="evenodd"></path></svg>
	</a>
</section>