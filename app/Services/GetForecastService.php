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

        if ($locations->count() == 1) {
            $locations->first()->forecast = $this->formatIndividualResponse($response);
            return $locations;
        }

        $i = 0;
        foreach ($response as $individual_response) {
            $locations[$i]['forecast'] = $this->formatIndividualResponse($individual_response);
            $i++;
        }

        return $locations;
    }

    private function formatIndividualResponse($individual_response) {
        return collect([
            'temperature_min' => $individual_response['daily']['temperature_2m_min'],
            'temperature_max' => $individual_response['daily']['temperature_2m_max'],
            'precipitation_probability' => $individual_response['daily']['precipitation_probability_mean']
        ]);
    }
}
