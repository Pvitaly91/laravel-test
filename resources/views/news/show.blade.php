@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>
    <div>{{ $news->content }}</div>
@endsection
