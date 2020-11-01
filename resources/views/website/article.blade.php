@extends('website.layout')

@section('content')
	<div class="bg-gray-100">
		<section class="container mx-auto py-16 p-4">

			    <img src="https://dummyimage.com/722x402" alt="blog" class="w-full" />

		        <h1 class="title-font text-3xl font-medium text-gray-900 mt-3">Shooting Stars</h1>
		        <h5 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1 mt-3">CATEGORY</h5>
		       
		       <p class="leading-relaxed mt-5">
		        	Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.
		        </p>

		</section>
	</div>

	@include('website.partials.brands')
    @include('website.partials.footer')
@endsection