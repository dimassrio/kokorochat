@extends('_layout.single')

@section('body')
	<div class="container">
		<div class="rows">
			<div class="large-12 medium-12 small-12 columns text-center">
				<b><h1>KOKORO</h1></b>
			</div>
		</div>
		<br><br><br><br>		
		<form action="{{url('login')}}" method="POST">
			<div class="row">
				<div class="large-offset-4 medium-offset-4 small-offset-1 large-4 medium-4 small-10 text-center end">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="large-offset-4 medium-offset-4 small-offset-1 large-4 medium-4 small-10 text-center end">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="large-offset-4 medium-offset-4 small-offset-1 large-4 medium-4 small-10 text-center end">
					<input type="submit" class="button">
				</div>
			</div>
		</form>
	</div>
@stop