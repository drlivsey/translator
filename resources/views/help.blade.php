@extends('layout')

@section('title','Rules')

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
		<article class="news__one">
			<h2 class="news__header">THERE IS SOME FAQ, IF YOU HAVE PROBLEMS - READ THIS</h2>
		</article>
		<article class="news__one">
			<p class="news__paragraph_faq">
				<span class="news__question_header">Q: WHERE DO I BEGIN?</span>
				<br>
				<span class="news__answer_header">A: Everything is simple! From registration)</span>
				<br>
				<br>
				<span class="news__question_header">Q: WHERE CAN I READ HOW TO USE TRANSLATOR?</span>
				<br>
				<span class="news__answer_header">A: You can read it in "RULES"</span>
				<br>
				<br>
				<span class="news__question_header">Q: I CAN'T USE TRANSLATOR, IT ALWAYS REDIRECTS TO AUTHORIZATION</span>
				<br>
				<span class="news__answer_header">A: You cannot use a translator without registering, JUST DO IT!)</span>
				<br>
				<br>
				<span class="news__question_header">Q: I HAVE SOME ERRORS WHEN TRY TO TRANSLATE MY TEXT</span>
				<br>
				<span class="news__answer_header">A: This most often occurs with typos or incorrect entries. Refer to the "RULES" section for more details.</span>
			</p>
		</article>
		<article class="news__one">
			<h2 class="news__header">PROBLEMS AND ERRORS</h2>
			<p class="news__paragraph">
				If you find any unresolved error, please contact us by e-mail: antoha.reshetnykov.1999@gmail.com
			</p>
		</article>
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