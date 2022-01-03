@guest
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Connexion à l'application
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text"
                                   name="username"
                                   value="{{ old('username') }}"
                                   class="form-control rounded-pill shadow-lg @error('username') is-invalid @enderror"
                                   id="username">
                            @error('username')
                            <p class="small text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Mot de passe <i class="bi bi-user-fill"></i>
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control rounded-pill shadow-lg"
                                   id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Connexion <i class="bi bi-box-arrow-in-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Création d'un nouveau compte
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@else
    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModal">
                        Déconnexion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">Vous êtes sur le point de vous déconnecter, êtes-vous sur de vouloir continuer ?</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary fw-bolder" data-bs-dismiss="modal">
                            Non
                        </button>
                        <button type="submit" class="btn btn-danger fw-bolder">
                            Oui <i class="bi-box-arrow-left"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endguest
