<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Map extends Component
{
    public array $locations = [];

    public function render(): View
    {
        return view('livewire.map');
    }
}
