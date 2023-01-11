<?php

namespace App\Http\Controllers;

use App\Repositories\MarkerRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MapController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('map');
    }

    public function getMarkersLocation(): \Illuminate\Http\JsonResponse
    {
        $response = [];
        foreach (MarkerRepository::getActual() as $item) {
            $response[] = [$item->getLat(), $item->getLng()];
        }

        return response()->json($response);
    }
}
