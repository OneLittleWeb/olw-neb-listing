<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class OrganizationController extends Controller
{
    public function cityWiseOrganization($city_slug, $category_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $category = Category::where('slug', $category_slug)->first();

        if ($city && $category) {
            $organizations = Organization::where('city_id', $city->id)->where('category_id', $category->id)->paginate(10);

//            dd($organizations);
            return view('organization.index', compact('organizations', 'city', 'category'));
        }

        abort(404);
    }


    public function import()
    {
        $county_directories = File::directories('F:\nebraska');

        foreach ($county_directories as $county_directory) {
            $county_name = basename($county_directory);

            foreach (File::directories($county_directory) as $city_directory) {

                $directory_name = basename($city_directory);
                $city_name = Str::lower(trim(str_replace("Nebraska US", '', $directory_name)));
                $city_id = City::where('name', $city_name)->first()->id;

                $files = File::files($city_directory);

                Excel::import(new ImportOrganization($county_name, $city_id), $files[0]);
            }
        }

        return redirect()->back();
    }
}
