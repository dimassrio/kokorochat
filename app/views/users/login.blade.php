<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		@section('title')
			Kokorochat | Heart for you, forever..
		@show
	</title>
		@section('meta_keywords')
		<meta name="keywords" content="your, awesome, keywords, here" />
		@show
		@section('meta_author')
		<meta name="author" content="Jon Doe" />
		@show
		@section('meta_description')
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />
		@show

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('assets/style.min.css')}}">
</head>
<body class="login">
	<div class="container">
		<br>
		<div class="row text-center">
			<img src="{{asset('assets/img/vector.png')}}">
		</div>
		<div class="row">
			<div class="large-12 medium-12 small-12 columns text-center">
				<b><h1>KOKORO</h1></b>
			</div>
		</div>
		<div class="row text-center">
			<p>Your personal assistant messenger</p>
			<p>by Telkomsel</p>
		</div>
		<div class="row text-center">
			<img src="{{asset('assets/img/komp.png')}}">
		</div>
		<br><br>		
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


</body>
</html>