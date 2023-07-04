@extends('base')

@section('title', 'Créer un article')

@section('content')

    <a href="{{ route('blog.index') }}"><p class="mt-5 mb-5 text-secondary rounded w-25 text-center">< Retour à la page d'accueil</p></a>

    <h1 class="mt-5 bg-secondary text-white text-center rounded mb-5 pb-2 w-75 mx-auto">Ajouter un nouvel article</h1>

    <form action="{{ route('blog.create') }}" method="POST" class="mt-5">
        @csrf


        <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Titre de l'article</label>
            <input  type="text" name="title" value="{{ old('title') }}" class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Slug de l'article</label>
            <input  type="text" name="slug" value="{{ old('slug') }}" class="form-control">
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label font-weight-bold text-secondary">Contenu de l'article</label>
            <textarea name="content" value="{{ old('content') }}" class="form-control" rows="3"></textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection

