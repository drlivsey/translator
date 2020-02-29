@extends('layout')

@section('title','Registration')

@section('content')
		<div>
			<a class="menu_item_layer__first" href="{{ asset('login') }}">LOG IN</a>
			<a class="menu_item_layer__second" href="{{ asset('login') }}">LOG IN</a>
		</div>
	</div>
</header>
<main>
	<form class="reg_form" role="form" method="post" action="{{ url('/reg') }}"> 
		{!! csrf_field() !!}
		<h1 class="reg_form__title">REGISTRATION</h1>
		<div>
			<input type="text" id="login" name="login" required>
			<label class="reg_form__movable_label" for="login">Email</label>
			@error('email')
                {{ $message }}
            @enderror
		</div>
		<div>
			<input type="text" id="password" name="password" required>
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