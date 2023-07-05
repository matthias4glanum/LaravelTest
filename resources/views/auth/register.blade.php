@extends('base')

@section('title', 'Utilisateurs')

@section('content')

<main class="login-form">
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-center text-white display-6">Ajouter un nouvel utilisateur</div>
                <div class="card-body">
                    <form action="{{ route('register.post') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="d-flex flex-column mb-4 mt-4">

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Nom" required autofocus>
                                    @if ($errors->has('firstname'))
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Prénom" required autofocus>
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" placeholder="Email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="password" placeholder="password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-4">

                            <div class="form-check form-switch mr-5">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="type" value="{{ \App\Enums\UserType::Admin->value }}">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Admin</label>
                            </div>

                            <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2" name="type" value="{{ \App\Enums\UserType::Member->value }}">
                                    <label class="form-check-label" for="flexSwitchCheckChecked2">Adhérent</label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-50">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
