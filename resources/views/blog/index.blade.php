@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <div>
        <h1 class="mt-5 text-center font-weight-bold text-secondary">Mon blog</h1>
    </div>

    <a class="nav-link" href="{{ route('blog.create') }}">
        <div>
            <button type="button" class="btn btn-secondary" title="Ajouter un nouvel article">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mt-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </div>
    </a>
    
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-info">
                        Lire la suite
                    </a>
                </td>
                <td>
                    <a href="{{ route('blog.edit', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-secondary">
                        Modifier
                    </a>
                </td>
                <form action="{{ route('blog.delete', ['id' => $post->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <td>
                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Are you sure?')"
                        >
                            Supprimer
                        </button>
                    </td>
                </form>
            </tr>
        @endforeach

        </tbody>

    </table>

    <div class="mt-5">{{ $posts->links() }}</div>

@endsection

