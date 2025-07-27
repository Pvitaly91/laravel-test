<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex gap-4">
                <a href="{{ url('/') }}" class="hover:underline">Головна</a>
                <a href="{{ route('products.index') }}" class="hover:underline">Товари</a>
            </div>
        </nav>
        <main class="container mx-auto p-4 flex-1">
            @yield('content')
        </main>
    </body>
</html>
