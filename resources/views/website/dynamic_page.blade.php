@extends('website.layout')
@section('content')
	<div class="bg-gray-100">
		<article class="ltr mx-auto py-16 p-4 prose-sm sm:prose">
			<h1 class="text-center">{{ (isset($page->title[$locale])) ? $page->title[$locale]  : ''}}</h1>

            <div>
                <img src="{{ $page->image ? $page->image['file_path'] : '' }}" class="img" alt="">
            </div>
            <div>{!! $page->body[$locale] !!}</div>
		</article>
	</div>

	@include('website.partials.brands')

    @include('website.partials.footer')
@endsection
