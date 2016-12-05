<!DOCTYPE html>
<html lang="en">
<head>
<title>Heba&nbsp;:&nbsp;@yield('title')</title>
<meta http-equiv = "Content-Type" name="csrf-token" content="{{ csrf_token() }}" charset="utf-8">
{!!Html::style('css/bootstrap.min.css')!!}
{!!Html::style('css/font-awesome.min.css')!!}
{!!Html::style('css/bootstrap-social.css')!!}
{!!Html::style('css/bootstrap-theme.min.css')!!}
{!!Html::style('css/mystyles.css')!!}
</head>
<body>
<div class="container">
	@yield('content')
</div>
</body>
</html>