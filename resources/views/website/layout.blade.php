<!DOCTYPE html>
<html lang="{{ $locale }}" class="h-full">
<head>
    <style type="text/css">
        v-cloak {
            display: none;
        }
    </style>
	<title>@yield('title', 'GoldenTest')</title>
    <meta charset="utf-8" />
	<meta name="title" content="@yield('title', '')" />
    <meta name="description" content="@yield('description', '')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta property="og:site_name" content=""/>
    <meta property="og:title" content="@yield('title', '')"/>
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="@yield('description')"/>
    <meta property="og:image" content="@yield('image')"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ mix('css/app.css') }}" rel="stylesheet" media="all">


    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#4d4d4d">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @if(isset(config('website.fonts')[$locale]))
        <link href="{{ config('website.fonts')[$locale] }}" rel="stylesheet">
    @endif

    <script>
        window.locale = "{{ $locale }}";
        window.direction = "{{ $direction }}";
        window.translations = @json($translations);
    </script>
</head>


<body dir="{{ $direction }}" class="h-full bg-gray-100 overflow-x-hidden">
	<div id="app" v-cloak class="w-full h-full">
	
		@yield('content')

        <portal-target name="modals" multiple>
        </portal-target>
	</div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>