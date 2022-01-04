@guest
    @include('auth.modal.loginModal')
    @include('auth.modal.registerModal')
@else
    @include('auth.modal.logoutModal')
@endguest
