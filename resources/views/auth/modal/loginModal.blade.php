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
                    <div class="mb-3 form-floating">
                        <input type="text"
                               name="username"
                               value="{{ old('username') }}"
                               class="form-control rounded-xl shadow-lg @error('username') is-invalid @enderror"
                               id="username">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        @error('username')
                        <p class="small text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password"
                               name="password"
                               class="form-control rounded-xl shadow-lg"
                               id="password">
                        <label for="password" class="form-label">
                            Mot de passe <i class="bi bi-user-fill"></i>
                        </label>
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
