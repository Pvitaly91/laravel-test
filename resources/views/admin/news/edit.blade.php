@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit News</h1>
    <form action="{{ route('admin.news.update', $news) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $news->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content-editor" name="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $news->content }}</textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
    </form>
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            ClassicEditor
                .create(document.querySelector('#content-editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
@endsection
