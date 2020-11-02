@extends('website.layout')

@section('content')
    <section>
        <div class="max-w-3xl mx-auto">
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