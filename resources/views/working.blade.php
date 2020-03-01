@extends('layout')

@section('title','Translator')

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
<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
@if(Session::has('syntax_error'))
	<div id="modal" class="modal__body">
		<div class="modal__syntax_error">
			<div class="modal__close" onclick="modal_close()">X</div>
			<h2 class="modal__syntax_error_header">ERROR OCCURED!</h2>
			<div class="modal__syntax_error_body">Expression syntax, there is not sach command line as "{{Session::get('syntax_error')}}"
				<div class="modal__syntax_error_fix">Fix commands and try again!</div>
			</div>
		</div>
	</div>
@elseif(Session::has('syntax'))
	
@endif
<main>
	<form class="main__body" role="form" method="POST" action="{{ url('/translate') }}">
		{!! csrf_field() !!}
	<article class="main__workspace">
		<div class="options">
			<h2>CODE EDITOR</h2>
			<span>Editor mode:</span>
			<div class="main__radio_btn">
				<input id="basic" type="radio" name="radio[]" value="basic" checked onchange="mode_select()">
				<label for="basic">Basic mode</label>
			</div>
			<div class="main__radio_btn">
				<input id="advanced" type="radio" name="radio[]" value="advanced" disabled onchange="mode_select()">
				<label for="advanced">Advanced mode</label>
			</div>
		</div>
		<textarea id="editor" class="main__editor" name="editor" >{{ old('editor') }}</textarea>
	</article>
	<aside class="main__options">
		<div class="options">
			<h2>OPTIONS</h2>
			<span>Programming language:</span>
			<div class="main__radio_btn">
				<input id="C" type="radio" name="radio_l" value="1" checked>
				<label for="C">C</label>
			</div>
			<div class="main__radio_btn">
				<input id="Cpp" type="radio" name="radio_l" value="2">
				<label for="Cpp">C++</label>
			</div>
			<div class="main__radio_btn">
				<input id="CS" type="radio" name="radio_l" value="3">
				<label for="CS">C#</label>
			</div>
			<div class="main__radio_btn">
				<input id="php" type="radio" name="radio_l" value="4">
				<label for="php">PHP</label>
			</div>
		</div>
		<div id="helper" class="main__option_help" unselectable="on"></div>
		<input class="main__submit" type="submit" name="s" value="PROCESS">
	</aside>
	</form>
</main>
<footer>
	
</footer>
@endsection