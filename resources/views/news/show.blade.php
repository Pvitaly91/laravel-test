@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
    <div class="text-gray-700 whitespace-pre-line">{{ $news->content }}</div>
@endsection
