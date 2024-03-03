@extends('layouts.app')
<script src="{{asset('js/map.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/map.css')}}">
@section('content')

    <div class="containter mt-4 mb-2">
        <h1>Weather Viewer</h1>

        <hr>

        <div id="map"></div>
    </div>

@endsection
