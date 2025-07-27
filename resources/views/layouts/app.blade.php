<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css" />
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex gap-4">
                <a href="{{ url('/') }}" class="hover:underline">Головна</a>
                <a href="{{ route('products.index') }}" class="hover:underline">Товари</a>
            </div>
        </nav>
        <div class="container mx-auto flex flex-1">
            @isset($categories)
                <aside class="w-48 p-4">
                    <ul class="bg-white rounded-lg shadow p-2 space-y-1">
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('categories.show', $cat['id']) }}" class="block hover:underline">{{ $cat['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            @endisset
            <main class="flex-1 p-4">
                @include('partials.breadcrumbs')
                @yield('content')
            </main>
        </div>
    </body>
</html>
