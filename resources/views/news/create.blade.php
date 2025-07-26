@extends('layouts.app')

@section('content')
<h1>Create News</h1>
<form method="POST" action="{{ route('news.store') }}">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
    </div>
    <div>
        <label>Body</label>
        <textarea name="body">{{ old('body') }}</textarea>
    </div>
    <button type="submit">Save</button>
</form>
@endsection
