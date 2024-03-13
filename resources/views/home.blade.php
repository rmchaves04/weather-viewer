@extends('layouts.app')
<script src="{{asset('js/map.js')}}" type="module"></script>
<link rel="stylesheet" href="{{asset('css/map.css')}}">
@section('content')

    <div class="containter mt-4 mb-2">
        <h1>Weather Viewer</h1>

        <hr>

        <x-flash-messages/>

        <form action="{{route('store-location')}}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-auto">
                    <label for="lat" class="col-form-label">lat</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="lat" name="latitude" class="form-control" readonly>
                </div>
                <div class="col-auto">
                    <label for="lng" class="col-form-label">lng</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="lng" name="longitude" class="form-control" readonly>
                </div>
                <div class="col-auto">
                    <label for="lng" class="col-form-label">location name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="location" name="name" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success"></i>Register Location</button>
                </div>
            </div>
        </form>

        <div id="map"></div>

        <hr>

        @if ($locations != null)
            <div class="row">
                <div class="col-12">
                    <h2>Forecasts</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th class="text-center">Minimum</th>
                                <th class="text-center">Maximum</th>
                                <th class="text-center">Chances of Rain</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($locations as $location)
                                <tr>
                                    <td>{{$location->name}}</td>
                                    <td class="text-center">{{$location->forecast['temperature_min']['data'][0]}} {{$location->forecast['temperature_min']['unit']}}</td>
                                    <td class="text-center">{{$location->forecast['temperature_max']['data'][0]}} {{$location->forecast['temperature_max']['unit']}}</td>
                                    <td class="text-center">{{$location->forecast['precipitation_probability']['data'][0]}} {{$location->forecast['precipitation_probability']['unit']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection
