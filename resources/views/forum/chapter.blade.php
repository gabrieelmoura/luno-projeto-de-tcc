@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $chapter->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            <pre>{{ $chapter->content }}</pre>
        </div>
    </div>
@endsection