<html>
	<head>
		<title>Restaurant App</title>
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	<body>

		@include("header")
		<div class="site_wrap">
			@yield('content')
		</div>
    @include("footer")
	</body>
</html>