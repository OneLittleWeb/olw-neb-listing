<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $cities = City::all();
        $city = null;
        return view('about-us', compact('cities', 'city'));
    }

    public function privacy()
    {
        $cities = City::all();
        $city = null;
        return view('privacy', compact('cities', 'city'));
    }

    public function contactUs()
    {
        $cities = City::all();
        $city = null;
        return view('contact', compact('cities', 'city'));
    }
}
