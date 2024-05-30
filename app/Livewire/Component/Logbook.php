<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Logbook extends Component
{

    public function hephep(){
        dd('magbatak ka na');
    }
    public function render()
    {
        return view('livewire.component.logbook');
    }
}
