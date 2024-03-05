<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocationRequest;

class LocationsController extends Controller
{
    public function index() {
        $locations = Location::all();

        return view('home', ['locations' => $locations]);
    }

    public function store(StoreLocationRequest $req) {
        $form_data = $req->validated();
        $location = Location::create($form_data);
        return back()->with('success', 'Location registered successfully.');
    }

}
