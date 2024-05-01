<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class SentMessage extends Component
{
    public $message;

     

    

    public function render()
    {
        return view('livewire.sent-message');
    }
}
