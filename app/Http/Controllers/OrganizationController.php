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
    public function cityWiseOrganizations($city_slug, $category_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $category = Category::where('slug', $category_slug)->first();

        if ($city && $category) {
            $organizations = Organization::where('city_id', $city->id)->where('category_id', $category->id)->paginate(10)->onEachSide(0);
            return view('organization.index', compact('organizations', 'city', 'category'));
        }

        abort(404);
    }

    public function cityWiseOrganization($city_slug, $organization_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $organization = Organization::where('slug', $organization_slug)->first();

        if ($city && $organization) {

            $organization->incrementViewCount();
            $five_star_reviews = $organization->reviews()->where('review_rate_stars', 5)->count();
            $four_star_reviews = $organization->reviews()->where('review_rate_stars', 4)->count();
            $three_star_reviews = $organization->reviews()->where('review_rate_stars', 3)->count();
            $two_star_reviews = $organization->reviews()->where('review_rate_stars', 2)->count();
            $one_star_reviews = $organization->reviews()->where('review_rate_stars', 1)->count();

            $organization->reviews_paginator = $organization->reviews()->orderByDesc('id')->paginate(5)->onEachSide(0);

            return view('organization.show', compact('organization', 'city','five_star_reviews','four_star_reviews','three_star_reviews','two_star_reviews','one_star_reviews'));
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
