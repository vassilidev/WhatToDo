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
