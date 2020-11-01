<section class="container mx-auto mt-10 p-4">
	<h3 class="text-xl text-center font-bold">{{ __('Looking for a Luxury Car Rental in Dubai?') }}</h3>
	<div class="text-center mt-2">{{ __('We Offer High-End New Cars, Full option Vehicles.') }}</div>

	<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mt-8">
		@foreach($categories as $cat)
			<a href="/{{$locale}}/category/{{ $cat->id }}">
				<figure class="effect-bubba w-full rounded shadow-md">
					<img class="w-full" src="{{ $cat->image ? $cat->image['file_path'] : '' }}" alt="img02">
					<figcaption class="flex items-center justify-center">
						<h2 class="text-4xl font-bold italic">{{ isset($cat->title[$locale]) ? $cat->title[$locale] : ''  }}</h2>
					</figcaption>			
				</figure>
			</a>
		@endforeach

		<a href="/{{$locale}}/cars">
			<figure class="effect-bubba w-full rounded shadow-md">
				<img class="w-full bg-white" src="/images/categories/all.png" alt="All">
				<figcaption class="flex items-center justify-center">
					<h2 class="text-4xl font-bold italic">{{ __('All') }}</h2>
				</figcaption>			
			</figure>
		</a>
	</div>
</section>