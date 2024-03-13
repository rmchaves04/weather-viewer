<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Services\GetForecastService;

class LocationsController extends Controller
{
    public function index(GetForecastService $get_forecast_service) {
        if (Location::all()->count() >= 1) {
            $locations = $get_forecast_service->getAllForecasts();
        } else {
            $locations = null;
        }

        return view('home', ['locations' => $locations]);
    }

    public function store(StoreLocationRequest $req) {
        $form_data = $req->validated();
        $location = Location::create($form_data);
        return back()->with('success', 'Location registered successfully.');
    }

}
