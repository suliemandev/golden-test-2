@extends('website.layout')
@section('content')
	<div class="bg-gray-100">
		<article class="ltr mx-auto py-16 p-4 prose-sm sm:prose">

			<div class="text-center">
				<img src="https://www.cmbcontracting.com/images/404.png" class="img" alt="" style="margin: auto;">
				<h2>Not found</h2>
				<p>
					The resource requested could not be found,
					<br>
					Click <a href="/" style="color: #fed123">here</a> to Home page.
				</p>
			</div>

		</article>
	</div>

	@include('website.partials.brands')

    @include('website.partials.footer')
@endsection