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

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('assets/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
<div class="head">
<p> Dashboard </p>
</div>

<div class="menu">
	<div class="row">
		<div class="icon-bar five-up small-12">
		  <div class="small-4 columns text-center">
		  <a class="item active">
		    <i class="fa fa-comments-o "></i>
		  </a>
		  </div>
		  
		  <div class="small-4 columns text-center">
		  <a class="item">
		    <i class="fa fa-phone-square"></i>
		  </a>
		  </div>
		  <div class="small-4 columns text-center">
		  <a class="item">
		    <i class="fa fa-user"></i>
		  </a>
		  </div>
	</div>
</div>
</div>