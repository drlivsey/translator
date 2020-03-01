@extends('layout')

@section('title','News')

@section('content')
		<div>
			@auth
				<a class="menu_item_layer__first" href="{{ asset('logout') }}">LOG OUT</a>
				<a class="menu_item_layer__second" href="{{ asset('logout') }}">LOG OUT</a>
			@endauth
			@guest
				<a class="menu_item_layer__first" href="{{ asset('login') }}">LOG IN</a>
				<a class="menu_item_layer__second" href="{{ asset('login') }}">LOG IN</a>
			@endguest
		</div>
	</div>
</header>
<main class="news__body">
	<section  class="news__main">
	@foreach($articles as $article)
		@php 
			$date_time = explode(' ', $article->updated_at);
		@endphp
		<article class="news__one">
			<h2 class="news__header">{{ $article->header }}</h2>
			<div class="news__info">Published by {{ $article->author }} | {{ Carbon\Carbon::parse($date_time[0])->format('d.m.Y') }} | {{ $date_time[1] }}</div>
			<p class="news__paragraph">{{ $article->article }}</p>
		</article>
	@endforeach
	</section>
	<aside class="news__aside">
		<h2 class="news__aside_header">NOW AVAILABLE LANGUAGES</h2>
		<div class="news__aside_languages">
			<div class="news__aside_lang">C</div>
			<div class="news__aside_lang">C++</div>
			<div class="news__aside_lang">C#</div>
			<div class="news__aside_lang">PHP</div>
		</div>
	</aside>
</main>
<footer>
	
</footer>
@endsection