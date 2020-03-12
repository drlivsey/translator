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
			<h2 class="news__header">WHAT IS OUR TRANSLATOR?</h2>
			<p class="news__paragraph">First of all, you should understand that our translator is a training system, it will not write programs for you, it will only help you understand the basics of the selected language and will demonstrate some algorithms such as bubble sorting or string sorting.Therefore, one should not expect too much from it.</p>
		</article>
		<article class="news__one">
			<h2 class="news__header">HOW TO USE OUR TRANSLATOR?</h2>
			<p class="news__paragraph">If you want to use our translator, then you need to have some knowledge of pseudo-code, without this you can not cope with the advanced mode of use. For the basic mode, it is enough to use the tips on the right side of the screen, you can also use the auto-insert by clicking on the panel on the right (you can see it on picture below).
			<img class="news__picture" src="{{ asset('images/rule_pic1.png') }}">
			When you made a design from the words suggested by auto-completion, select the programming language in which you want to get the code and click the "PROCESS" button, after processing your request in the modal window, you will receive a code in the selected language with comments and explanations.
			<img class="news__picture" src="{{ asset('images/rule_pic2.png') }}" style="width: 45%;">
			Everything is ready, now you can study the received code and familiarize yourself with the comments, where the essence of the ongoing process is described in some detail.
</p>
		</article>
		<article class="news__one">
			<h2 class="news__header">PROBLEMS AND ERRORS</h2>
			<p class="news__paragraph">If an error occurs during processing of your pseudo-code, you will be notified of this by a dialog box indicating the line where the inaccuracy was made.
			<img class="news__picture" src="{{ asset('images/rule_pic3.png') }}">
			Why can errors occur? Everything is simple. Either you made a typo while writing pseudo-code or accidentally jammed either while entering the variable name, or specifically trying to break stranslyatsii system (in this case, HANDS OFF FROM MY SERVICE), in other cases check your pseudo-code one more time and try again.
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