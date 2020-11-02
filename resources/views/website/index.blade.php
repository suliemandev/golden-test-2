@extends('website.layout')

@section('content')
	<particle 
        class="bg-gradient-dark flex flex-col h-full items-center justify-between relative w-screen">
        @include('website.partials.navigation')

        <div class="p-4 h-full items-center justify-center flex flex-col">
            <h2 class="text-4xl lg:text-6xl text-black text-center">
                {{ __('Discover Your') }} <span class="font-bold">{{ __('Future') }} </span>
            </h2>
            <h4 class="text-lg lg:text-2xl text-center mt-4 text-black opacity-75 mb-16">
                {{ __('Intro description') }}
            </h4>

            <div class="flex flex-shrink-0 items-center justify-center">
                
                <div class="bg-black me-6 flex w-16 h-16 relative border-2 border-black rounded-full z-10 items-center justify-center">
                    <svg class="relative z-10 w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M232.3125,114.34375,88.34375,26.35937A15.99781,15.99781,0,0,0,64,40.00781V215.99219a16.00521,16.00521,0,0,0,24.34375,13.64843L232.3125,141.65625a16.00727,16.00727,0,0,0,0-27.3125Z"></path></svg>
                    <span class="animate-ping absolute inline-flex h-12 w-12 rounded-full bg-black opacity-75"></span>
                </div>

                <button class="border-2 border-black focus:outline-none hover:bg-black hover:text-white px-6 py-3 rounded-full text-black z-10 text-lg">
                    {{ __('Start') }}
                </button>
            </div>
        </div>

        <div></div>
    </particle>
            
    <section>
        <div class="max-w-3xl mx-auto mb-10">
            <div class="bg-white rounded-xl shadow-xl w-full">
                <quiz></quiz>
            </div>
        </div>
    </section>

	@include('website.partials.footer')

	{{-- @include('website.partials.banner')

	@include('website.partials.slides')

	@include('website.partials.categories')

	@include('website.partials.brands')

	@include('website.partials.tabs')

	@include('website.partials.about')

	@include('website.partials.requirments')

	@include('website.partials.footer') --}}
@endsection