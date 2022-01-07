@if(Auth::user()->hasRequestedToFollow($user))
    <button class="btn btn-outline-dark" wire:click="unfollow">
        Demandé
    </button>
@else
    <button class="btn rounded-pill lift @if($isFollowing) btn-primary @else btn-light @endif"
            wire:click="toggleFollow">
        @if($isFollowing)
            <i class="bi-person-x-fill"></i>
        @else
            S'abonner <i class="bi-person-check-fill"></i>
        @endif
    </button>
@endif
