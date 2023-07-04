@extends('base')

@section('title', $post->title)

@section('content')

    <a href="{{ route('blog.index') }}"><p class="mt-5 mb-5 text-secondary rounded w-25 text-center">< Retour à la page d'accueil</p></a>

    <div class="d-flex justify-content-center">
        <article>
            <h1>{{ $post->title }}</h1>
            <p>
                {{ $post->content }}
            </p>
        </article>
    </div>

@endsection

