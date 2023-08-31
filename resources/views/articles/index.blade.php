@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('#') }}" class="card-img-top" alt="Article Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Likes: {{ $article->likes }}</li>
                        <li class="list-group-item">Views: {{ $article->views }}</li>
                    </ul>
                    <div class="card-footer">
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
@endsection
