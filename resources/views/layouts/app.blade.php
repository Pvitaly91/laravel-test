<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'News Site' }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        nav a { margin-right: 10px; }
    </style>
</head>
<body>
<nav>
    <a href="{{ route('news.index') }}">News</a>
    <a href="{{ route('news.create') }}">Create News</a>
</nav>
<hr>
@yield('content')
</body>
</html>
