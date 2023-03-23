<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class OrganizationController extends Controller
{
    public function cityWiseOrganizations($city_slug, $category_slug)
    {
        $city_check = City::where('slug', $city_slug)->exists();
        $category_check = Category::where('slug', $category_slug)->exists();

        if ($city_check && $category_check) {
            $city = City::where('slug', $city_slug)->first();
            $category = Category::where('slug', $category_slug)->first();
            $category->meta_title = Str::title($category->name) . ' in ' . Str::title($city->name) . ', NE | nebraskalisting.com';

            $categories = Category::all();
            $cities = City::all();

            $organizations = Organization::where('city_id', $city->id)
                ->where('category_id', $category->id)
                ->orderByRaw('CAST(reviews_total_count AS SIGNED) DESC')
                ->orderByRaw('CAST(rate_stars AS SIGNED) DESC')
                ->paginate(10)
                ->onEachSide(0);

            Meta::setPaginationLinks($organizations);
            return view('organization.index', compact('organizations', 'cities', 'city', 'category', 'categories'));
        } else {
            return $this->categoryWiseOrganizations($city_slug, $category_slug);
        }
    }

    public function categoryWiseOrganizations($category_slug, $city_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $city = City::where('slug', $city_slug)->first();

        if ($category && $city) {
            $category->meta_title = Str::title($category->name) . ' in ' . Str::title($city->name) . ', NE | nebraskalisting.com';

            $categories = Category::all();
            $cities = City::all();

            $organizations = Organization::where('city_id', $city->id)
                ->where('category_id', $category->id)
                ->orderByRaw('CAST(reviews_total_count AS SIGNED) DESC')
                ->orderByRaw('CAST(rate_stars AS SIGNED) DESC')
                ->paginate(10)
                ->onEachSide(0);

            Meta::setPaginationLinks($organizations);

            return view('organization.index', compact('organizations', 'cities', 'city', 'category', 'categories'));
        }
        abort(404);
    }

    public function cityWiseOrganization($city_slug, $organization_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $organization = Organization::where('slug', $organization_slug)->first();

        if ($city && $organization) {

            $cities = City::all();

            $organization->incrementViewCount();
            $five_star_reviews = $organization->reviews()->where('review_rate_stars', 5)->count();
            $four_star_reviews = $organization->reviews()->where('review_rate_stars', 4)->count();
            $three_star_reviews = $organization->reviews()->where('review_rate_stars', 3)->count();
            $two_star_reviews = $organization->reviews()->where('review_rate_stars', 2)->count();
            $one_star_reviews = $organization->reviews()->where('review_rate_stars', 1)->count();

            if ($organization->organization_address) {
                $meta = explode(',', $organization->organization_address);
                $organization->meta_title = $organization->organization_name . ' -' . $meta[1] . ',' . $meta[2];
            } else {
                $organization->meta_title = $organization->organization_name . ' - ' . $city->name . ', ' . 'NE';
            }

            $organization->reviews_paginator = $organization->reviews()->orderByDesc('id')->paginate(10)->onEachSide(0);
            Meta::setPaginationLinks($organization->reviews_paginator);

            return view('organization.show', compact('organization', 'city', 'cities' , 'five_star_reviews', 'four_star_reviews', 'three_star_reviews', 'two_star_reviews', 'one_star_reviews'));
        }

        abort(404);
    }


    public function import()
    {
        $category_directories = File::directories('H:\scraped data');

        foreach ($category_directories as $category_directory) {

            $category_name = basename($category_directory);
            $category_id = Category::where('name', Str::lower($category_name))->first()->id;

            foreach (File::directories($category_directory) as $city_directory) {

                $directory_name = basename($city_directory);
                $city_name = Str::lower(trim(str_replace("Nebraska US", '', $directory_name)));
                $city_id = City::where('name', $city_name)->first()->id;

                $files = File::files($city_directory);

                Excel::import(new ImportOrganization($category_id, $city_id), $files[0]);
            }
        }

        alert()->success('success', 'Data imported successfully.');

        return redirect()->back();
    }

    public function copyPast()
    {
        $category_directories = File::directories('H:\scraped data');

        foreach ($category_directories as $category_directory) {
            foreach (File::directories($category_directory) as $category) {
                $sourcePath = File::glob($category . '/media/*');

                foreach ($sourcePath as $source) {

                    $destinationPath = 'H:\images';
                    $file = basename($source);
                    $destinationPath = $destinationPath . '/' . $file;
                    File::copy($source, $destinationPath);
                }
            }
        }

        alert()->success('success', 'Images copy and past successfully completed.');

        return redirect()->back();
    }
}
