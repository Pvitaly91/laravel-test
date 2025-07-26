@extends('layouts.app')

@section('content')
    <h1>News</h1>
    <a href="{{ route('admin.news.create') }}">Create</a>
    <ul>
        @foreach($news as $item)
            <li>
                {{ $item->title }}
                <a href="{{ route('admin.news.edit', $item) }}">Edit</a>
                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
