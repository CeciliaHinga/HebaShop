<!DOCTYPE html>
<html lang="en">
<head>
<title>Heba&nbsp;:&nbsp;@yield('title')</title>
<meta http-equiv = "Content-Type" name="csrf-token" content="{{ csrf_token() }}" charset="utf-8">
<link rel="stylesheet" href="{!! elixir('css/final.css') !!}">
{!!Html::style('css/bootstrap-social.css')!!}

</head>
<body class="hold-transition login-page">
@yield('content')
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="{!! elixir('js/final.js') !!}" async defer></script>

@yield('scripts')
    </body>
</html>