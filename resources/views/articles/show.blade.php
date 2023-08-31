@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->content }}</p>
            <p>Likes: {{ $article->likes }}</p>
            <p>Views: {{ $article->views }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h2>Comments</h2>
            @foreach ($article->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach

            <h3>Add a Comment</h3>
            <form action="{{ route('comments.store', $article->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
