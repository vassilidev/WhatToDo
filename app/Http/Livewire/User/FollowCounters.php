<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class FollowCounters extends Component
{
    public User $user;

    public $listeners = ['refreshCounter' => '$refresh'];

    public function render()
    {
        $this->user->loadCount([
            'followers' => fn(Builder $query) => $query->accepted(),
            'followings' => fn(Builder $query) => $query->accepted(),
        ]);

        return view('livewire.user.follow-counters');
    }
}
