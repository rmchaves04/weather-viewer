@extends('layouts.app')
<script src="{{asset('js/map.js')}}" type="module"></script>
<link rel="stylesheet" href="{{asset('css/map.css')}}">
@section('content')

    <div class="containter mt-4 mb-2">
        <h1>Weather Viewer</h1>

        <hr>

        <form action="#">
            <div class="row mb-2">
                <div class="col-auto">
                    <label for="lat" class="col-form-label">lat</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="lat" class="form-control" readonly>
                </div>
                <div class="col-auto">
                    <label for="lng" class="col-form-label">lng</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="lng" class="form-control" readonly>
                </div>
                <div class="col-auto">
                    <label for="lng" class="col-form-label">location</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="location" class="form-control" readonly>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success"></i>Register Location</button>
                </div>
            </div>
        </form>

        <div id="map"></div>
    </div>

@endsection
