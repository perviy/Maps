<?php

namespace App\Http\Livewire;

use App\Models\Marker;
use App\Repositories\MarkerRepository;
use Illuminate\View\View;
use Livewire\Component;

class MapForm extends Component
{
    public function render(): View
    {
        return view('livewire.map-form');
    }

    public $lat;
    public $lng;

    public function save()
    {
        $validatedData = $this->validate([
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180',
        ]);

        $this->addMarker($validatedData);

        $this->resetForm();
    }

    private function addMarker($data)
    {
        (new Marker($data))->save();

        $markers = [];
        foreach (MarkerRepository::getActual() as $item) {
            $markers[] = [$item->getLat(), $item->getLng()];
        }

        $this->emit('markersChanged', $markers);
    }

    public function resetForm()
    {
        $this->lat = null;
        $this->lng = null;
    }
}
