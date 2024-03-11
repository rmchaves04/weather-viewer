<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class GetForecastService
{

    public function getAllForecasts(): Collection {
        $latitudes = Location::all()->pluck('latitude')->toArray();
        $longitudes = Location::all()->pluck('longitude')->toArray();

        $response = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => $latitudes,
            'longitude' => $longitudes,
            'daily' => ['temperature_2m_min', 'temperature_2m_max', 'precipitation_probability_mean']
        ])->json();

        return $this->formatResponse($response);
    }

    private function formatResponse($response): Collection {
        $locations = Location::all();

        $i = 0;
        foreach ($response as $location_forecast) {
            $locations[$i]['forecast'] = collect([
                'temperature_min' => $location_forecast['daily']['temperature_2m_min'],
                'temperature_max' => $location_forecast['daily']['temperature_2m_max'],
                'precipitation_probability' => $location_forecast['daily']['precipitation_probability_mean']
            ]);
            $i++;
        }

        return $locations;
    }

}
