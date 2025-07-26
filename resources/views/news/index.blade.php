@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">News</h1>
    <ul class="space-y-2">
        @foreach($news as $item)
            <li>
                <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:underline hover:text-blue-800">
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
