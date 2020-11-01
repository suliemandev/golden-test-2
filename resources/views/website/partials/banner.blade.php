@php
if(!empty($banner->link)) {
	$link = $banner->link;

	if (strpos($link, 'http') === false) {
		$link = '/' . $locale . $link;
	}

}
@endphp
<section class="bg-yellow-500 p-2 font-bold text-black text-sm sm:text-base text-center">
	@if($banner)
	<a href="{{ $link }}">{{ $banner->title[$locale] }}</a>
	@else
	{{ __('50% LIMITED DISCOUNT APPLIED ON ALL CARS') }}
	@endif
</section>