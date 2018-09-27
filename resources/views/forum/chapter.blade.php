@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $chapter->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        @if($chapter->content)
            <div>
                <pre>{{ $chapter->content }}</pre>
            </div>
        @endif
        @if($chapter->media->exists && preg_match("/\.pdf$/", $chapter->media->location))
            <div style="margin-top: 20px">
                <iframe src="{{ $chapter->media->location }}" style="width: 100%; height: 900px"></iframe>
            </div>
        @endif
        @if($chapter->media->exists)
            <div style="margin-top: 20px">
                <a download href="{{ $chapter->media->location }}" class="btn btn-primary">
                    <i class="fa fa-download"></i> Download
                </a>
            </div>
        @endif
    </div>
@endsection