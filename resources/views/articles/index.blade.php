@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="row align-items-stretch">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('public/image/photo.jpg') }}" class="card-img-top" alt="Article Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span><img class="pictures" src="{{ asset('public/image/view.png') }}" alt="view">{{ $article->views }}</span>
                        <img class="pictures" src="{{ asset('public/image/like.png') }}" alt="like">
                    </div>
                    <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Просмотреть</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links('pagination.custom') }}
    </div>
@endsection
