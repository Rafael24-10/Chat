<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;


class SentMessage extends Component
{
    public $message;
    public $timestamp;

     

    

    public function render()
    {
        return view('livewire.sent-message');
    }
}
