<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function sitemapStore()
    {
        // create new sitemap object
        $sitemap_pages = App::make("sitemap");
        // add item to the sitemap (url, date, priority, freq)
        $sitemap_pages->add(route('all.categories'), Carbon::now()->format('Y-m-d\T00:00:00+06:00'), '1.0', 'daily');
        $sitemap_pages->add(route('city.index'), Carbon::now()->format('Y-m-d\T00:00:00+06:00'), '1.0', 'daily');
        $sitemap_pages->store('xml', 'sitemap-pages');

        //For category business
        $sitemap_category_business = App::make("sitemap");
        $business_categories = Category::all();
        foreach ($business_categories as $business_category) {
            $sitemap_category_business->add(route('category.business', $business_category->slug), Carbon::now()->format('Y-m-d\T00:00:00+06:00'), '0.7', 'monthly');
        }
        $sitemap_category_business->store('xml', 'sitemap_category_business');

        //city and category wise business
        $sitemap_city_category_category_business = App::make("sitemap");
        $businesses = Organization::all();

        foreach ($businesses as $business) {
            $city_slug = $business->city->slug;
            $category_slug = $business->category->slug;
            $sitemap_city_category_category_business->add(route('city.wise.organization', ['city_slug' => $business->city->slug, 'organization_slug' => $business->slug]), Carbon::now()->format('Y-m-d\T00:00:00+06:00'), '0.7', 'monthly');
        }
        $sitemap_city_category_category_business->store('xml', 'sitemap_city_category_category_business');


        // create sitemap index
        $sitemap = App::make("sitemap");
        $sitemap->addSitemap(URL::to('sitemap-pages.xml'),Carbon::now()->format('Y-m-d\T00:00:00+06:00'));
        $sitemap->addSitemap(URL::to('sitemap_category_business.xml'),Carbon::now()->format('Y-m-d\T00:00:00+06:00'));
        $sitemap->addSitemap(URL::to('sitemap_city_category_category_business.xml'),Carbon::now()->format('Y-m-d\T00:00:00+06:00'));

        $sitemap->store('sitemapindex', 'sitemap_index');

        return redirect(url('sitemap_index.xml'));
    }
}
