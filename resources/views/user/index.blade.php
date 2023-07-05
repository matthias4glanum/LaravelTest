@extends('base')

@section('title', 'Utilisateurs')

@section('content')

    @php
        $type = $users->groupBy('type')->map(function ($type) {
        return $type->count();
        })
    @endphp

    <div>
        <h1 class="mt-5 text-left text-secondary mb-5"><span>{{ $users->count() }}</span> Utilisateurs</h1>
    </div>

    <div>
        <p class="mt-5 mb-5 text-left font-weight-bold text-secondary">
            Adhérents : <span>{{ $type['Admin'] }}</span><br>
            Admins : <span>{{ $type['Adhérent'] }}</span></p>
    </div>

    <button
        type="button"
        class="btn btn-primary p-1 mb-5"
        title="Ajouter un nouvel utilisateur"
        data-bs-toggle="modal" data-bs-target="#addUserModale"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
        </svg>
    </button>

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
                <th scope="col" class="text-primary">Type</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                {{-- <th scope="row">{{ $user->id }}</th> --}}
                <td class="lh-lg">{{ $user->firstname }}</td>
                <td class="lh-lg">{{ $user->lastname }}</td>
                <td class="lh-lg">{{ $user->email }}</td>
                <td class="lh-lg">{{ $user->type }}</td>

                <td>
                    <button
                        type="button"
                        class="btn btn-outline-secondary w-75"
                        data-bs-toggle="modal" data-bs-target="#editModale_{{$user->id}}"
                        data-action="{{ route('user.edit', ['id' => $user->id])}}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                </td>


                <td>
                    <a href="#" class="btn btn-outline-primary w-75">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                        </svg>
                    </a>
                </td>

                <td>
                    <button
                        type="button"
                        class="btn btn-outline-danger w-75"
                        data-bs-toggle="modal" data-bs-target="#deleteModal_{{$user->id}}"
                        data-action="{{ route('user.delete', ['id' => $user->id])}}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16" class="bi bi-trash-fill mt-1">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                </td>

                <!-- Modal Add User -->
                <div class="modal fade"
                    id="addUserModale"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-bg-primary">
                                <h5 class="modal-title text-center bg-red-600 mx-auto" id="staticBackdropLabel">Ajouter un utilisateur</h5>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body">
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
                <!-- Fin Modal Add User -->

                <!-- Modal Edit -->
                <div class="modal fade"
                id="editModale_{{$user->id}}"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-bg-secondary">
                            <h5 class="modal-title text-center bg-red-600 mx-auto" id="staticBackdropLabel">Modifier {{ $user->firstname }} {{ $user->lastname }}</h5>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        </div>
                        <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="POST">
                            @method('POST')
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <div class="form-group row mt-4">
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
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="type" value="{{ \App\Enums\UserType::Admin->value }}"
                                            @if ($user->type === \App\Enums\UserType::Admin->value)
                                                checked
                                            @endif
                                        >
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Admin</label>
                                </div>

                                <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2" name="type" value="{{ \App\Enums\UserType::Member->value }}"
                                            @if ($user->type === \App\Enums\UserType::Member->value)
                                                checked
                                            @endif
                                        >
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">Adhérent</label>
                                </div>
                            </div>

                            <div class="modal-footer mx-auto mb-4 mt-4">
                                <button type="button" class="btn btn-secondary mr-5" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary mx-auto">
                                    Modifier
                                </button>
                            </div>
                            <div class="">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade"
                    id="deleteModal_{{$user->id}}"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-bg-danger">
                                <h5 class="modal-title text-center bg-red-600 mx-auto" id="staticBackdropLabel">Supprimer {{ $user->firstname }} {{ $user->lastname }}</h5>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body">
                                <p class="mt-3">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="{{ route('user.delete', ['id' => $user->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Modal Delete -->

            </tr>
        @endforeach

        </tbody>
    </table>

    <script>
        $(function(){
            $('#member').DataTable({
                // dom: 'Bfrtip',
                // select: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                },
                rowReorder: true,
                initComplete: function(settings) {
                //settings.nTable.id --> Get table ID
                $('#'+settings.nTable.id+'_filter input').wrap(`
                    <div class="d-inline-flex position-relative"></div>
                `).after(`
                    <button type="button" class="close position-absolute" aria-label="Close" style="right:5px">
                    <span aria-hidden="true">&times;</span>
                    </button>
                `).attr('required','required').attr('title','Search');

                // Click Event on Clear button
                $(document).on('click', '#'+settings.nTable.id+'_filter button', function(){
                    $('#'+settings.nTable.id).DataTable({
                    "retrieve": true,
                    }).search('').draw(); // reDraw table
                });
                }
            });
        });
    </script>

    <script>
        var myModal = document.getElementById('member')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })
    </script>

@endsection

