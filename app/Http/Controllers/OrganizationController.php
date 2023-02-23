<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Models\Organization;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

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

    public function importView()
    {
        return view('importFile');
    }

    public function import()
    {
        $county_directories = File::directories('F:\nebraska');

        foreach ($county_directories as $county_directory) {
            $county_name = basename($county_directory);

            foreach (File::directories($county_directory) as $city_directory) {

                $directory_name = basename($city_directory);
                $city_name = trim(str_replace("Nebraska US", '', $directory_name));
                $files = File::files($city_directory);

                Excel::import(new ImportOrganization($county_name, $city_name), $files[0]);
            }
        }

        return redirect()->back();
    }
}
