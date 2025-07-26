@extends('layouts.app')

@section('content')
    <h1>Create News</h1>
    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Content</label>
            <textarea name="content"></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
