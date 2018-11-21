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
        @if($chapter->media->exists)
            <div style="margin-top: 20px">
                <iframe src="{{ route('storage.chapter', ['id' => $chapter->id]) }}" style="width: 100%; height: 900px"></iframe>
            </div>
            <div style="margin-top: 20px">
                <a download href="{{ route('storage.chapter', ['id' => $chapter->id]) }}" class="btn btn-primary">
                    <i class="fa fa-download"></i> Download
                </a>
            </div>
        @endif
        @if(true)
            <div style="margin-top: 20px">
                <a href="{{ route('forum.edit-chapter', ['id' => $classroom->id, 'cid' => $chapter->id]) }}" class="btn btn-primary">
                    Editar
                </a>
                <a href="{{ route('forum.delete-chapter', ['id' => $classroom->id, 'cid' => $chapter->id]) }}" class="btn btn-danger">
                    Deletar
                </a>
            </div>
        @endif
    </div>
@endsection