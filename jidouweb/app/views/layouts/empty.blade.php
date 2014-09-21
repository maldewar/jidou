<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			@section('title')
			Internet of Vending
			@show
		</title>
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">

		<!-- Container -->
		<div class="container" data-role="page">
			<!-- Content -->
			@yield('main')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

	</body>
</html>
