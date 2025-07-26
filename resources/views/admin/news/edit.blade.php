@extends('layouts.app')

@section('content')
    <h1>Edit News</h1>
    <form action="{{ route('admin.news.update', $news) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $news->title }}">
        </div>
        <div>
            <label>Content</label>
            <textarea name="content">{{ $news->content }}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
