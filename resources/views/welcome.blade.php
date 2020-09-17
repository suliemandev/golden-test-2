<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.header')
    </head>
    <body class="animsition">
		
        <div class="page-wrapper">
        	@include('layouts.head')

    		<div class="page-content--bgf7">
    			@include('layouts.breadcrumb')

        		@yield('content')

				@include('layouts.footer')
			</div>

		</div>

        @include('layouts.js_includes')
        @yield('page_js')
    </body>
</html>
