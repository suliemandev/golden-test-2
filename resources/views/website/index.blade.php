@extends('website.layout')

@section('content')
	<particle 
        class="bg-gradient-dark flex flex-col h-full items-center justify-between relative w-screen">
        @include('website.partials.navigation')

        <div class="p-4 h-full items-center justify-center flex flex-col">
            <h2 class="text-4xl lg:text-6xl text-gray-900 text-center">
                Discover Your <span class="font-bold">Future</span>
            </h2>
            <h4 class="text-2xl lg:text-4xl text-white text-center mt-4 text-gray-900">الاختبار الذهبي، فحص الميول التعليمية</h4>
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