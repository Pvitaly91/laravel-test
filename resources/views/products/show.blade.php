@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">&larr; Назад до списку</a>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        @if(!empty($product['pictures']))
            @php($main = $product['pictures'][0])
            <div class="md:w-1/2">
                <div id="main-image-container" class="mb-2 overflow-hidden flex justify-center items-center" style="height:auto">
                    <a id="main-image-link" href="{{ $main }}" data-fancybox="gallery">
                        <img id="main-image" src="{{ $main }}" alt="{{ $product['name'] }}" class="w-full object-contain rounded">
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
            const mainImage = document.getElementById('main-image');
            const container = document.getElementById('main-image-container');
            const link = document.getElementById('main-image-link');

            function updateHeight() {
                if (mainImage.complete) {
                    container.style.height =  '500px';
                }
            }

            mainImage.addEventListener('load', updateHeight);
            window.addEventListener('DOMContentLoaded', updateHeight);

            document.querySelectorAll('#thumbnails .thumb').forEach(img => {
                img.addEventListener('click', () => {
                    const url = img.dataset.src;
                    link.href = url;
                    mainImage.src = url;
                });
            });
        </script>
    @endif
@endsection
