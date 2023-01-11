<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Marker;

class MarkerRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<Marker>
     */
    public static function getActual(): \Illuminate\Database\Eloquent\Collection
    {
        return  Marker::query()->where(
            'created_at',
            '>',
            Carbon::now()->subMinute()->toDateTimeString()
        )->get();
    }

    public static function deleteOld(): void
    {
        Marker::query()->where(
            'created_at',
            '<',
            Carbon::now()->subDay()->toDateTimeString()
        )->delete();
    }
}
