@extends('base')

@section('title', 'Ajouter un utilisateur')

@section('content')

    <a href="{{ route('user.index') }}"><p class="mt-5 mb-5 text-secondary rounded w-25 text-center">< Retour à la page d'accueil</p></a>

    <h1 class="mt-5 bg-secondary text-white text-center rounded mb-5 pb-2 w-75 mx-auto">Ajouter un nouvel utilisateur</h1>

    <form action="{{ route('user.create') }}" method="POST" class="mt-5">
        @csrf


        <div class="mb-3 w-25">
            <label class="form-label font-weight-bold text-secondary">Nom</label>
            <input  type="text" name="firstname" value="{{ old('firstname') }}" class="form-control">
            @error('firstname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 w-25">
            <label class="form-label font-weight-bold text-secondary">Prénom</label>
            <input  type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
            @error('lastname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 w-25">
            <label class="form-label font-weight-bold text-secondary">Email</label>
            <input  type="text" name="email" value="{{ old('email') }}" class="form-control">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 w-25">
            <label class="form-label font-weight-bold text-secondary">Mot de passe</label>
            <input  type="text" name="password" value="{{ old('password') }}" class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection

