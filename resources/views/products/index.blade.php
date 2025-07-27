@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Список товарів</h1>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($products as $product)
            <a href="{{ route('products.show', $product['id']) }}" class="block border rounded-lg bg-white hover:shadow p-4">
                @if(!empty($product['pictures']))
                    <img src="{{ $product['pictures'][0] ?? '' }}" alt="{{ $product['name'] }}" class="mb-2 w-full h-40 object-contain">
                @endif
                <div class="font-semibold">{{ $product['name_ua'] ?: $product['name'] }}</div>
                <div class="text-gray-600">{{ $product['price'] }} {{ $product['currency'] }}</div>
            </a>
        @endforeach
    </div>
@endsection
