@extends('layouts.app')

@section('content')
<h1>Edit News</h1>
<form method="POST" action="{{ route('news.update', $news) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $news->title) }}">
    </div>
    <div>
        <label>Body</label>
        <textarea name="body">{{ old('body', $news->body) }}</textarea>
    </div>
    <button type="submit">Update</button>
</form>
@endsection
