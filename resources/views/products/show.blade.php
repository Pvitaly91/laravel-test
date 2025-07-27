@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">&larr; Назад до списку</a>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        @if(!empty($product['pictures']))
            <div class="md:w-1/2 space-y-2">
                <a href="{{ $product['pictures'][0] ?? '' }}" data-fancybox="gallery">
                    <img src="{{ $product['pictures'][0] ?? '' }}" alt="{{ $product['name'] }}" class="w-full rounded-lg object-contain">
                </a>
                @if(count($product['pictures']) > 1)
                    <div class="grid grid-cols-3 gap-2">
                        @foreach(array_slice($product['pictures'], 1) as $pic)
                            <a href="{{ $pic }}" data-fancybox="gallery">
                                <img src="{{ $pic }}" alt="{{ $product['name'] }}" class="w-full h-24 object-contain rounded">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-2">{{ $product['name_ua'] ?: $product['name'] }}</h1>
            <div class="text-lg mb-4">{{ $product['price'] }} {{ $product['currency'] }}</div>
            <div>{!! $product['description'] !!}</div>
        </div>
    </div>
@endsection
