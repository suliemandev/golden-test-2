@extends('website.layout')

@section('content')
	<div class="bg-gray-100">
		<section class="md:container w-full mx-auto md:py-8">
	        <div class="flex text-gray-700 flex-col lg:flex-row">
	        	<div class="w-full lg:w-1/2">
					<car-images :slides="{{ $product->images }}"></car-images>
	        	</div>

	            <div class="bg-transparent md:bg-white flex flex-col justify-center mb-12 px-6 py-4 sm:py-8 rounded-e w-full">
					<h2 class="text-sm title-font text-gray-500">
						{{ isset($product->brand->title[$locale]) ? $product->brand->title[$locale] : '' }}
					</h2>
	                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
	                	{{ isset($product->title[$locale]) ? $product->title[$locale] : '' }}
	                </h1>
	                
	                <div class="flex mb-4">
	                    <span class="flex items-center">
	                        <svg v-for="item in 5" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
	                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
	                        </svg>
	                    </span>
	                </div>
	                
					<div class="flex text-gray-600 flex-col mt-4">
						<div class="flex flex-row mb-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
							{{-- {{  __('From') }}:  --}}
							<span class="text-black mx-1 font-semibold">₪{{ $product->price }}</span> 
							{{ __('/Day') }}
						</div>

						<div class="flex flex-row mb-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
							{{ __('Deposit') }}: ₪{{ $product->description[$locale] }}
						</div>

						<div class="flex flex-row mb-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
							{{  __('250KM Included') }}
						</div>

						<div class="flex flex-row mb-2">
							<svg class="w-6 h-6 text-yellow-500 p-0.5 me-2"  fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M16,4    c5.207,0,9.605,3.354,11.266,8H4.734C6.395,7.354,10.793,4,16,4z M16,18c-1.105,0-2-0.895-2-2s0.895-2,2-2s2,0.895,2,2    S17.105,18,16,18z M4,16c5.465,0,9.891,5.266,9.984,11.797C8.328,26.828,4,21.926,4,16z M18.016,27.797    C18.109,21.266,22.535,16,28,16C28,21.926,23.672,26.828,18.016,27.797z"></path></svg>

							{{  __('Free Delivery to Hotels/Airport.') }}
						</div>

						<div class="flex flex-row mb-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
							{{  __('Best Price Guaranteed.') }}
						</div>
					</div>

	                <div class="flex mt-5">
						<button @click="showBookingModal = true" class="w-full sm:w-auto text-center text-white bg-yellow-500 border-0 py-3 px-8 focus:outline-none hover:bg-yellow-600 rounded">
							{{ __('Book Now') }}
						</button>
					</div>

					<div>
						<p class="message-status"></p>
					</div>
	            </div>
			</div>
					

			@if(!empty($product->youtube_url))
				<div class="mt-10">
					<iframe width="560" height="315" src="{{$product->youtube_url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			@endif
		</section>
	</div>

	<book-now :show="showBookingModal" @close="showBookingModal = false" :product="{{ $product }}"></book-now>

	@include('website.partials.brands')
	{{-- @include('website.partials.tabs') --}}
    @include('website.partials.footer')
@endsection