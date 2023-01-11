<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'lng',
    ];

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    public function getLng(): float
    {
        return $this->lng;
    }
}
