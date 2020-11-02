@extends('website.layout')

@section('content')
	<particle 
        class="bg-gradient-dark flex flex-col h-full items-center justify-between relative w-screen">
        @include('website.partials.navigation')

        <div class="p-4 h-full items-center justify-center flex flex-col">
            <h2 class="text-3xl sm:text-4xl lg:text-6xl text-black text-center z-10">
                {{ __('Discover Your') }} <span class="font-bold">{{ __('Future') }} </span>
            </h2>
            <h4 class="text-md sm:text-lg lg:text-xl text-center mt-4 text-black opacity-75 z-10">
                {{ __('Intro description') }}
            </h4>

            <div class="flex items-center justify-center mb-16 mt-7 lg:mt-10">
                
                <button @click.prevent="slideToVideo" class="cursor-pointer bg-black border-2 border-black flex flex-shrink-0 h-16 items-center justify-center me-4 sm:me-6 relative rounded-full w-16 z-10 text-yellow-500 hover:text-white focus:outline-none">
                    <svg class="relative z-10 w-6 h-6" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M232.3125,114.34375,88.34375,26.35937A15.99781,15.99781,0,0,0,64,40.00781V215.99219a16.00521,16.00521,0,0,0,24.34375,13.64843L232.3125,141.65625a16.00727,16.00727,0,0,0,0-27.3125Z"></path></svg>
                    <span class="animate-ping absolute inline-flex h-12 w-12 rounded-full bg-black opacity-50"></span>
                </a>

                <button @click.prevent="scrollTo('#quiz')" class="border-2 border-black flex-shrink-0 focus:outline-none hover:bg-black hover:text-white font-semibold px-6 sm:px-10 py-3 rounded-full text-black text-lg z-10">
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