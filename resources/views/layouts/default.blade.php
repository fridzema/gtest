<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Github toolbox</title>
        <meta name="description" content="Github toolbox">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    </head>
    <body style="padding-top: 50px;">
    	<div class="ui container padded ui inverted segment">
				@yield('content')
			</div>

			<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>