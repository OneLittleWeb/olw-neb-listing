<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_cities = City::where('is_major',1)->get();
        $popular_cities = City::take(8)->orderByDesc('population')->get();

        return view('home',compact('categories','major_cities','popular_cities'));
    }
}