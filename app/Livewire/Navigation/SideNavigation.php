<?php

namespace App\Livewire\Navigation;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SideNavigation extends Component
{
    public $activeRoute;

    public function mount()
    {
        $this->activeRoute = Request::url();
    }
    public function render()
    {
        return view('livewire.navigation.side-navigation');
    }
}
