<ul class="nav navbar-dark nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
    @guest
        <li class="nav-item">
            <a href="{{ route('homepage') }}" class="nav-link py-3 px-2" title="{{ config('app.name') }}"
               data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="bi-geo-alt-fill fs-1"></i>
            </a>
        </li>
    @else
        <div class="dropdown">
            <a href="#"
               class="d-flex align-items-center justify-content-center p-3 text-decoration-none dropdown-toggle"
               id="dropDownMarkers" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-1 bi-geo-alt-fill"></i>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropDownMarkers">
                <li>
                    <a class="dropdown-item" href="{{ route('homepage') }}">
                        Accueil <i class="bi-house-fill"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('marker.create') }}">
                        Créer un nouveau marker <i class="bi-plus-circle-fill"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        Mes markers <i class="bi-geo-alt-fill"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        Marker Likés <i class="bi-heart-fill"></i>
                    </a>
                </li>
            </ul>
        </div>
    @endguest

    <li class="nav-item">
        <i title="Changer le thème" data-bs-toggle="tooltip"
           data-bs-placement="right" class="nav-link py-3 px-2 fs-1 bi-{{ $theme != 'dark' ? 'moon' : 'sun' }}-fill" id="theme-toggle"></i>
    </li>

    <li class="nav-item">
        <a href="{{ route('homepage') }}" class="nav-link py-3 px-2" title="Contactez-nous"
           data-bs-toggle="tooltip" data-bs-placement="right">
            <i class="bi-envelope-fill fs-1"></i>
        </a>
    </li>
    @guest
        <li class="nav-item" data-bs-toggle="modal" data-bs-target="#loginModal">
            <a href="#" class="nav-link py-3 px-2" title="Se connecter"
               data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="bi bi-box-arrow-in-right fs-1"></i>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="modal" data-bs-target="#registerModal">
            <a href="#" class="nav-link py-3 px-2" title="S'inscrire"
               data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="bi bi-pencil-square fs-1"></i>
            </a>
        </li>
    @else
        <div class="dropdown">
            <a href="#"
               class="d-flex align-items-center justify-content-center p-3 text-decoration-none dropdown-toggle"
               id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fs-1 bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                <li>
                    <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">
                        Mon profil <i class="bi-person-circle"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">
                        Paramètres du compte <i class="bi-gear-fill"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#">
                        Déconnexion <i class="bi-door-open-fill"></i>
                    </a>
                </li>
            </ul>
        </div>
    @endguest
</ul>
