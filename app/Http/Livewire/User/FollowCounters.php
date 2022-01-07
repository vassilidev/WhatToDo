<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class FollowCounters extends Component
{
    public User $user;

    public $listeners = ['refreshCounter' => '$refresh'];

    public function render()
    {
        $this->user->loadCount(['followers', 'followings']);

        return view('livewire.user.follow-counters');
    }
}
