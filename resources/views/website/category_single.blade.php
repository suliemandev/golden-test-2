@extends('website.layout')

@section('content')

<div class="bg-gray-100">
	<section class="container mx-auto py-16 p-4">
		<h3 class="text-4xl text-yellow-500 text-center font-bold">{{ isset($category->title[$locale]) ? $category->title[$locale] : '' }}</h3>


		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mt-8">
			@if(count($category->activeProducts))
			@foreach($category->activeProducts as $product)
			<a href="/{{$locale}}/car/{{$product->id}}" class="bg-white rounded-md overflow-hidden shadow-md">
				<img class="w-full" src="{{ $product->image ? $product->image['file_path'] : '' }}" alt="img02" style="height: 240px; object-fit:cover;">
				
				<div class="p-4">
					<h4 class="font-bold text-center text-lg">{{ (isset($product->brand->title[$locale]) ? $product->brand->title[$locale] : '') . ' ' . (isset($product->title[$locale]) ? $product->title[$locale] : '') }}</h4>

					<div class="flex text-gray-600 flex-col mt-3 text-sm">

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
						
						{{-- <div class="flex flex-row">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
							From: <span class="text-black">{{ sprintf('%0.2f', $product->price) }}₪</span> /Day
						</div> --}}

						{{-- <div class="flex flex-row mt-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
							Description: <span class="text-black">{{ isset($product->description[$locale]) ? $product->description[$locale]  : ''}}</span>
						</div> --}}
{{-- 
						<div class="flex flex-row mt-2">
							<svg class="w-6 h-6 text-yellow-500 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
							250KM Included
						</div> --}}
					</div>
				</div>
			</a>
			@endforeach
			@else
				<div class="p-12">
					<span>No cars found</span>
				</div>
			@endif
		</div>
	</section>
</div>

	@include('website.partials.brands')

    @include('website.partials.footer')
@endsection