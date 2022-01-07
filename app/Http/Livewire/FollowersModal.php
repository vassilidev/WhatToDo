<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class FollowersModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.followers-modal');
    }
}
