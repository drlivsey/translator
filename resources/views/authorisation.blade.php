@extends('layout')

@section('title','Authorisation')

@section('content')
		<div>
			<a class="menu_item_layer__first" href="{{ asset('reg') }}">REGISTRATION</a>
			<a class="menu_item_layer__second" href="{{ asset('reg') }}">REGISTRATION</a>
		</div>
	</div>
</header>
<main>
	<form class="reg_form" role="form" method="post" action="{{ url('/login') }}"> 
		{!! csrf_field() !!}
		<h1 class="reg_form__title">
			@if(Session::has('header'))
				{{Session::get('header')}}
			@else
				AUTHORISATION
			@endif
		</h1>
		<div>
			<input type="text" id="login" name="login" required>
			<label class="reg_form__movable_label" for="login">Email</label>
		</div>
		<div>
			<input type="password" id="password" name="password" required>
			<label class="reg_form__movable_label" for="password">Password</label>
			@error('password')
                {{ $message }}
            @enderror
		</div>
		<div>
			<input type="submit" name="s" value="GO">
		</div>
	</form>
</main>
<footer>
	
</footer>
@endsection