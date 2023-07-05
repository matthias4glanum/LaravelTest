@extends('base')

@section('title', 'Modifier un utilisateur')

@section('content')

<main class="update-form">
    <a href="{{ route('user.index') }}"><p class="mt-5 mb-5 text-secondary rounded w-25 text-center">< Retour à la page d'accueil</p></a>
    <div class="container  mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier</div>
                    <div class="card-body">

                        <form action="{{ route('user.edit', ['user' => $user]) }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input type="text" id="firstname" class="form-control" name="firstname" value="{{ $user->firstname }}" required autofocus>
                                    @if ($errors->has('firstname'))
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="lastname" class="col-md-4 col-form-label text-md-right">Prénom</label>
                              <div class="col-md-6">
                                  <input type="text" id="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}" required autofocus>
                                  @if ($errors->has('lastname'))
                                      <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                  @endif
                              </div>
                          </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-4">

                                <div class="form-check form-switch mr-5">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="type"
                                            @if ($user->type === \App\Enums\UserType::Admin->value)
                                                checked
                                            @else
                                                value=""
                                            @endif
                                        >
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Admin</label>
                                </div>

                                <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2" name="type"
                                            @if ($user->type === \App\Enums\UserType::Member->value)
                                                checked
                                            @else
                                                value=""
                                            @endif
                                        >
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">Adhérent</label>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection
