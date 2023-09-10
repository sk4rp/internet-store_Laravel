@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->content }}</p>
            <div class="emotions">
                <span><img class="pictures" src="{{ asset('public/image/view.png') }}" alt="view">{{ $article->views }}</span>
                <img class="pictures" src="{{ asset('public/image/like.png') }}" alt="like">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Комментарии</h2>
            @foreach ($article->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach

            @if($errors->any())
                <div class="alert alert-warning">
                    <ul style="list-style-type: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3>Добавить комментарий</h3>
            <form action="{{ route('comments.store', $article->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Добавить</button>
            </form>
        </div>
    </div>
@endsection
