@extends('base')

@section('title', 'Utilisateurs')

@section('content')


    <div class="container d-flex">

        <button
            type="button"
            class="btn btn-primary p-1 mb-5 ml-3"
            title="Ajouter un nouvel utilisateur"
            data-bs-toggle="modal" data-bs-target="#addMemberModale"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>
        </button>

    </div>

    {{-- <button type="button" class="btn btn-primary p-1 mb-5" title="Ajouter un nouvel utilisateur">
        <a class="nav-link text-white" href="{{ route('register') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>
        </a>
    </button> --}}

    <table id="member" class="table table-striped table-hover mb-5">
        <thead>
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col" class="text-primary">Nom</th>
                <th scope="col" class="text-primary">Prénom</th>
                <th scope="col" class="text-primary">Email</th>
                <th scope="col" class="text-primary">Date</th>
                <th scope="col" class="text-primary">Charte</th>
                <th scope="col" class="text-primary">Certificat médical</th>
                <th scope="col" class="text-primary">Paiement</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($members as $member)
            <tr>
                {{-- <th scope="row">{{ $member->id }}</th> --}}
                <td class="lh-lg">{{ $member->firstname }}</td>
                <td class="lh-lg">{{ $member->lastname }}</td>
                <td class="lh-lg">{{ $member->email }}</td>
                {{-- <td class="lh-lg">{{ $member->type }}</td> --}}
                <td class="lh-lg fw-bold text-primary">{{ $member->created_at->format('d-m-Y à H:i:s') }}</td>
                <td class="lh-lg">{{ $member->charter }}></td>
                <td class="lh-lg">{{ $member->medical_certificate }}></td>
                <td class="lh-lg">{{ $member->payment }}></td>
        @endforeach

        <!-- Modal Add Member -->
        <div class="modal fade"
        id="addMemberModale"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-bg-primary">
                    <h5 class="modal-title text-center bg-red-600 mx-auto" id="staticBackdropLabel">Ajouter un membre</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('register.member') }}" method="POST">
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
                        </div>

                        <div class="d-flex justify-content-center mb-4">

                            {{-- <div class="form-group row justify-content-center">
                                <div class="ml-5">
                                    <input type="checkbox" id="charter" name="charter" placeholder="Charte" autofocus>
                                    @if ($errors->has('charter'))
                                        <span class="text-danger">{{ $errors->first('charter') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="ml-5">
                                    <input type="checkbox" id="medical_certificate" name="medical_certificate" placeholder="Certificat médical" autofocus>
                                    @if ($errors->has('medical_certificate'))
                                        <span class="text-danger">{{ $errors->first('medical_certificate') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="ml-5">
                                    <input type="checkbox" id="email_address" name="payment" placeholder="Paiement" autofocus>
                                    @if ($errors->has('payment'))
                                        <span class="text-danger">{{ $errors->first('payment') }}</span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="d-flex justify-content-center mb-4">
                                @foreach ($members as $member)
                                    <div class="form-check form-switch mr-5">
                                            <input class="form-check-input" type="radio" id="switchCheckChecked" name="charter" value="{{ $member->charter }}">
                                            <label class="form-check-label" for="switchCheckChecked">Charte</label>
                                    </div>

                                    <div class="form-check form-switch ml-3">
                                            <input class="form-check-input" type="radio" id="switchCheckChecked" name="medical_certificate" value="{{ $member->medical_certificate }}">
                                            <label class="form-check-label" for="switchCheckChecked">Certificat médical</label>
                                    </div>

                                    <div class="form-check form-switch ml-3">
                                        <input class="form-check-input" type="radio" id="switchCheckChecked" name="payment" value="{{ $member->payment }}">
                                        <label class="form-check-label" for="switchCheckChecked">Paiement</label>
                                    </div>
                                @endforeach
                            </div>


                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-secondary mr-5" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal Add Member -->

@endsection

