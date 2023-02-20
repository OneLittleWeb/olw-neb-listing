<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('county.index');
    }

    public function allCity()
    {
        return view('city.index');
    }

    public function importExcelData()
    {
        dd('ok');
    }
}
