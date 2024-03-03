<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function getMapsKey() {
        return json_encode(env('GOOGLE_API_KEY'));
    }
}
