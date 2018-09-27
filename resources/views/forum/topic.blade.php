@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>{{ $topic->title }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('forum.home', ['id' => $classroom->id]) }}">{{ $classroom->description }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('forum.section', ['id' => $classroom->id, 'sid' => $section->id]) }}">{{ $section->title }}</a></li>
            <li class="breadcrumb-item active">{{ $topic->title }} </li>
        </ol>
        @foreach($posts as $post)
            <div class="forum__post clearfix {{ !$loop->first ? 'forum__post--response' : '' }}">
                <div class="forum__post__header">
                    <span class="forum__post__user-name">
                        <a href="{{ route('site.user', ['id' => $post->creator->id]) }}">{{ $post->creator->user_name }}</a>
                    </span>
                    <img src="{{ $post->creator->avatar->location }}" class="forum__post__user-photo">
                    <table class="forum__post__user-statistics">
                        <tr>
                            <td>Mensagens</td>
                            <td>{{ $post->creator->posts_count }}</td>
                        </tr>
                        <tr>
                            <td>Tópicos</td>
                            <td>{{ $post->creator->topics_count }}</td>
                        </tr>
                    </table>
                </div>
                <div class="forum__post__content">
                    <table class="forum__post__meta">
                        <tr>
                            <td>{{ $topic->title }}</td>
                        </tr>
                        <tr>
                            <td>por {{ $post->creator->user_name }} {{ $post->created_at->diffForHumans() }}</td>
                        </tr>
                    </table>
                    <pre>{{ $post->content }}</pre>
                </div>
            </div>
        @endforeach
        <div class="clearfix" style="margin-top: 15px;">
            <div class="pull-left">
                {{ $posts->links() }}
            </div>
            <div class="pull-right">
                <a href="{{ route('forum.newPost', ['id' => $classroom->id, 'sid' => $section->id, 'tid' => $topic->id]) }}" class="btn btn-primary">
                    Responder
                </a>
            </div>
        </div>
    </div>
@endsection