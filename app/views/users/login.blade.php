@extends('_layout.single')

@section('body')
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2>LOGIN</h2>
		</div>
	</div>
	<form action="{{url('login')}}" method="POST">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<input type="submit" class="btn btn-info btn-lg">
			</div>
		</div>
	</form>
@stop