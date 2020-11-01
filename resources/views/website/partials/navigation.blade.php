<navigation locale="{{ $locale }}">
	{{-- <div class="px-4 py-8">
		<h3 class="text-lg font-bold">{{ __('Car list') }}</h3>
		<div class="grid grid-cols-2 sm:grid-cols-3 gap-5 mt-4">
			@foreach($categories as $cat)
				<a href="/{{$locale}}/category/{{ $cat->id }}">
					<img class="w-full rounded" src="{{ $cat->image ? $cat->image['file_path'] : '' }}" alt="img02">
					<h5 class="text-sm sm:text-md font-bold mt-1">{{ isset($cat->title[$locale]) ? $cat->title[$locale] : '' }}</h5>
				</a>
			@endforeach

			<a href="/{{$locale}}/cars">
				<img class="w-full" src="/images/categories/all.png" alt="All">
				<h5 class="text-sm sm:text-md font-bold mt-1">{{ __('All') }}</h5>
			</a>
		</div>
	</div>

	<div class="px-4 py-8">
		<h3 class="text-lg font-bold">{{ __('Brands') }}</h3>
		<div class="grid grid-cols-2 sm:grid-cols-3 gap-5 mt-4">
			@foreach($brands as $brand)
				<a class="bg-gray-100 p-3" href="/{{$locale}}/brand/{{ $brand->id }}">
					<img class="h-32 object-contain rounded w-full" src="{{ $brand->image ? $brand->image['file_path'] : '' }}" alt="img02">
				</a>
			@endforeach
		</div>
	</div> --}}
</navigation>