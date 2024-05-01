<?php

namespace App\Livewire;

use Livewire\Component;

class ReceivedMessage extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.received-message');
    }
}
