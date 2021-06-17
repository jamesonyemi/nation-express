<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NationFlagController extends Controller
{
    //
    public function index()
    {
        # code...
        return Http::get('https://restcountries.eu/rest/v2/all');

    }

    public function show($country_id)
    {
        # code...
        return $country_id;
    }

    public function region()
    {
        # code...
        return 'region';
    }
}
