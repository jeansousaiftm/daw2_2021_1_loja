<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>
		Admin Panel
	</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/catalogo.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/core/jquery.min.js') }}"></script>
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
</head>
<body>
	<div class="container">
		@yield("content")
	</div>
</body>