@extends('base')

@section('title', 'Modifier un article')

@section('content')

    <a href="{{ route('blog.index') }}"><p class="mt-5 mb-5 text-secondary rounded w-25 text-center">< Retour à la page d'accueil</p></a>

    <h1 class="mt-5 bg-secondary text-white text-center rounded mb-5 pb-2 w-75 mx-auto">Modifier l'article : {{ $post->title }}</h1>

    <form action="{{ route('blog.edit', $post) }}" method="POST" class="mt-5">
        @csrf

        <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Titre de l'article</label>
            <input  type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Slug de l'article</label>
            <input  type="text" name="title" value="{{ old('slug', $post->slug) }}" class="form-control">
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Contenu de l'article</label>
            <textarea name="content" value="{{ old('content'), $post->content }}" class="form-control" rows="3">{{ $post->content }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>

    </form>

@endsection

