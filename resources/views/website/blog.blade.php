@extends('website.layout')

@section('content')

	<div class="bg-gray-100">
	    <section class="container mx-auto py-16 p-4">
	        <h3 class="text-4xl text-yellow-500 text-center font-bold">{{ __('Blog') }}</h3>

	        <div class="flex flex-wrap mt-10">
				@if(count($blogs)) 
				@foreach($blogs as $blog)
	            <div class="p-4 md:w-1/3">
	                <div class="h-full shadow-sm rounded-lg overflow-hidden bg-white">
	                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $blog->image ? $blog->image['file_path'] : '' }}" alt="blog" style="height: 240px; object-fit: cover;" />
	                    <div class="p-6">
	                        {{--
	                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">CATEGORY</h2>
	                        --}}
	                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ isset($blog->title[$locale]) ? $blog->title[$locale] : '' }}</h1>
	                        <p class="leading-relaxed mb-3">{{ substr(strip_tags(isset($blog->body[$locale]) ? $blog->body[$locale] :''), 0, 100) }}</p>
	                        <div class="flex items-center flex-wrap">
	                            <a href="/{{$locale}}/blog/{{$blog->id}}" class="text-yellow-500 inline-flex items-center md:mb-2 lg:mb-0">
	                                {{ __('Read More') }}
	                                <svg class="w-4 h-4 ms-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
	                                    <path d="M5 12h14"></path>
	                                    <path d="M12 5l7 7-7 7"></path>
	                                </svg>
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>
				@endforeach
				@else
	            <div class="p-12">
	                <span>No blogs found</span>
	            </div>
	            @endif
	        </div>
	    </section>
	</div>


	@include('website.partials.brands')

    @include('website.partials.footer')
@endsection