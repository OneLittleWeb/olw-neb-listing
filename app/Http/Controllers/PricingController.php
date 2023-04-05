<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $city = null;
        return view('pricing', compact('cities', 'city'));
    }
}
