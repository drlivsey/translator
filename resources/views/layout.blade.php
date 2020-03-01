<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
<header>
	<img src="{{ asset('images/logo.png') }}">
	<div class="menu">
		<div>
			@auth
				<a class="menu_item_layer__first" href="{{ asset('translate') }}">TRANSLATE</a>
				<a class="menu_item_layer__second" href="{{ asset('translate') }}">TRANSLATE</a>
			@endauth
			@guest
				<a class="menu_item_layer__first" href="{{ asset('translate') }}">START WORK</a>
				<a class="menu_item_layer__second" href="{{ asset('translate') }}">START WORK</a>
			@endguest
		</div>
		<div>
			<a class="menu_item_layer__first" href="{{ asset('home') }}">NEWS</a>
			<a class="menu_item_layer__second" href="{{ asset('home') }}">NEWS</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="{{ asset('rules') }}">RULES</a>
			<a class="menu_item_layer__second" href="{{ asset('rules') }}">RULES</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="{{ asset('help') }}">HELP</a>
			<a class="menu_item_layer__second" href="{{ asset('help') }}">HELP</a>
		</div>
		<div>
			<a class="menu_item_layer__first" href="{{ asset('about') }}">ABOUT US</a>
			<a class="menu_item_layer__second" href="{{ asset('about') }}">ABOUT US</a>
		</div>
	@yield('content')
</body>
</html>