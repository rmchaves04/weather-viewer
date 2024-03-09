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
                    <label for="lng" class="col-form-label">location</label>
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

        <div class="row">
            <div class="col-12">
                <h2>Locations</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Minimum</th>
                            <th>Maximum</th>
                            <th>Precipitaion Probability</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{$location->name}}</td>
                                <td>{{$location->forecast['temperature_min'][0]}}</td>
                                <td>{{$location->forecast['temperature_max'][0]}}</td>
                                <td>{{$location->forecast['precipitation_probability'][0]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

@endsection
