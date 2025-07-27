@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">&larr; Назад до списку</a>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        @if(!empty($product['pictures']))
            @php($main = $product['pictures'][0])
            <div class="md:w-1/2">
                <div class="mb-2">
                    <a id="main-image-link" href="{{ $main }}" data-fancybox="gallery">
                        <img id="main-image" src="{{ $main }}" alt="{{ $product['name'] }}" class="w-full max-h-96 object-contain rounded">
                    </a>
                </div>
                <div class="flex gap-2 overflow-x-auto" id="thumbnails">
                    @foreach($product['pictures'] as $pic)
                        <img src="{{ $pic }}" data-src="{{ $pic }}" class="thumb w-20 h-20 object-contain cursor-pointer border rounded" />
                    @endforeach
                </div>
            </div>
        @endif
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-2">{{ $product['name_ua'] ?: $product['name'] }}</h1>
            <div class="text-lg mb-4">{{ $product['price'] }} {{ $product['currency'] }}</div>
            <div>{!! $product['description'] !!}</div>
        </div>
    </div>
    @if(!empty($product['pictures']))
        <script>
            document.querySelectorAll('#thumbnails .thumb').forEach(img => {
                img.addEventListener('click', () => {
                    const url = img.dataset.src;
                    document.getElementById('main-image').src = url;
                    document.getElementById('main-image-link').href = url;
                });
            });
        </script>
    @endif
@endsection
