@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">&larr; Назад до списку</a>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        @if(!empty($product['pictures']))
            <div class="md:w-1/2">
                <img src="{{ $product['pictures'][0] }}" alt="{{ $product['name'] }}" class="w-full rounded-lg">
            </div>
        @endif
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-2">{{ $product['name_ua'] ?: $product['name'] }}</h1>
            <div class="text-lg mb-4">{{ $product['price'] }} {{ $product['currency'] }}</div>
            <div>{!! $product['description'] !!}</div>
        </div>
    </div>
@endsection
