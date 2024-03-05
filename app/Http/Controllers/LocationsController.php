<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index() {
        return view('home');
    }

}
