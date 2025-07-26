@extends('layouts.app')

@section('content')
<h1>{{ $news->title }}</h1>
<p>{{ $news->body }}</p>
<a href="{{ route('news.edit', $news) }}">Edit</a>
<form method="POST" action="{{ route('news.destroy', $news) }}" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection
