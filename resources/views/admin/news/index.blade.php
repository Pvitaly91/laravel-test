@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">News</h1>

    <div class="mb-4">
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</a>
    </div>

    <ul class="space-y-2">
        @foreach($news as $item)
            <li class="bg-white p-4 rounded shadow flex items-center justify-between">
                <span>{{ $item->title }}</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
