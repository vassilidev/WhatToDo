<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Auth;
use Livewire\Component;

class FollowButtons extends Component
{
    public User $user;

    public function toggleFollow()
    {
        Auth::user()->toggleFollow($this->user);

        $this->emitTo(FollowCounters::class, 'refreshCounter');
    }

    public function unfollow()
    {
        Auth::user()->unfollow($this->user);
    }

    public function render()
    {
        $isFollowing = Auth::user()->isFollowing($this->user);

        return view('livewire.user.follow-buttons', compact('isFollowing'));
    }
}
