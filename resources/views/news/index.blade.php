@extends('layouts.app')

@section('content')
    <h1>News</h1>
    <ul>
        @foreach($news as $item)
            <li><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
@endsection
