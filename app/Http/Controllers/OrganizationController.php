<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Mail\ClaimBusinessMail;
use App\Mail\ClaimedBusiness;
use App\Mail\ClaimedNotificationToAdmin;
use App\Mail\ContactForClaimToAdmin;
use App\Mail\ContactForClaimToUser;
use App\Mail\ContactUsMail;
use App\Models\Category;
use App\Models\City;
use App\Models\ContactForClaimBusiness;
use App\Models\Organization;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class OrganizationController extends Controller
{
    public function cityWiseOrganizations($city_slug, $category_slug)
    {
        $city_check = City::where('slug', $city_slug)->exists();
        $category_check = Category::where('slug', $category_slug)->exists();

        if ($city_check && $category_check) {
            $city = City::where('slug', $city_slug)->first();
            $category = Category::where('slug', $category_slug)->first();

            $categories = Category::all();
            $cities = City::all();

            $organizations = Organization::where('city_id', $city->id)
                ->where('category_id', $category->id)
                ->orderByRaw('CAST(reviews_total_count AS SIGNED) DESC')
                ->orderByRaw('CAST(rate_stars AS SIGNED) DESC')
                ->paginate(10)
                ->onEachSide(0);

            $files = File::files(public_path('images/badges'));
            $images = [];
            $organization_badge = '';

            foreach ($files as $file) {
                $images[] = $file->getRelativePathname();

                foreach ($images as $image) {
                    if ($image == $organizations[0]->category->name . ' - ' . $organizations[0]->city->name . '.png')
                    {
                        $organization_badge = $image;
                    }
                }
            }

            $organization_count = Organization::where('city_id', $city->id)
                ->where('category_id', $category->id)->count();

            if ($organizations->onFirstPage()) {
                $category->meta_title = 'Top 10 Best ' . Str::title($category->name) . ' near ' . Str::title($city->name) . ', Nebraska';
            } else {
                $category->meta_title = Str::title($category->name) . ' near ' . Str::title($city->name) . ', Nebraska';
            }

            Meta::setPaginationLinks($organizations);
            return view('organization.index', compact('organizations', 'cities', 'city', 'category', 'categories', 'organization_badge', 'organization_count'));
        }
        return abort(404);
    }

//    public function cityWiseOrganizations($city_slug, $category_slug)
//    {
//        if ($city_slug && $category_slug) {
//            $city = City::where('slug', $city_slug)->first();
//            $category = Category::where('slug', $category_slug)->first();
//
//            if ($city && $category) {
//                $category->meta_title = Str::title($category->name) . ' in ' . Str::title($city->name) . ', NE | nebraskalisting.com';
//
//                $categories = Category::select('id', 'name', 'slug', 'icon', 'background', 'background_image')->get();
//                $cities = City::select('id', 'name', 'slug', 'is_major', 'population', 'background_image')->get();
//
//                $organizations = Organization::withCount('reviews')
//                    ->where('city_id', $city->id)
//                    ->where('category_id', $category->id)
//                    ->leftJoin('reviews', 'organizations.organization_guid', '=', 'reviews.organization_guid') // Left join to include reviews table
//                    ->select('organizations.*', DB::raw('COUNT(reviews.id) AS reviews_count')) // Calculate the reviews_count
//                    ->groupBy('organizations.id') // Group by organization to avoid duplicates
//                    ->orderBy('reviews_count', 'DESC') // Order by the reviews_count
//                    ->paginate(10);
//
//                Meta::setPaginationLinks($organizations);
//                return view('organization.index', compact('organizations', 'cities', 'city', 'category', 'categories'));
//            }
//        }
//        return abort(404);
//    }

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

            //For Restaurants/Resorts/Hotels
            $restaurant_type = [22, 21, 12];


            //For Gyms/Nail Salons/Hair Salons/Beauty Salons
            $gym_type = [10, 16, 11, 1];

            //For Landscapers/Physical Therapists/Dentists/Car Wash/Car Detailing/Car Rental
            $landscaper_type = [14, 19, 6, 4, 2, 3];

            if (in_array($organization->category_id, $restaurant_type)) {
                if ($organization->organization_address) {
                    $address_line = explode(',', $organization->organization_address);
                    $organization->about1 = 'Sitting at the Breathtaking spot of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at' . $address_line[1] . ',' . $address_line[2] . '.';
                } else {
                    $organization->about1 = 'Sitting at the Breathtaking spot of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at ' . Str::title($organization->city->name) . ', NE.';
                }
            } elseif (in_array($organization->category_id, $gym_type)) {
                if ($organization->organization_address) {
                    $address_line = explode(',', $organization->organization_address);
                    $organization->about1 = 'Sitting at the bustling city-center of ' . Str::title($organization->city->name) . ', ' . "<strong>$organization->organization_name</strong>" . ' is located at' . $address_line[1] . ',' . $address_line[2] . '.';
                } else {
                    $organization->about1 = 'Sitting at the bustling city-center of ' . Str::title($organization->city->name) . ', ' . "<strong>$organization->organization_name</strong>" . ' is located at ' . Str::title($organization->city->name) . ', NE.';
                }
            } elseif (in_array($organization->category_id, $landscaper_type)) {
                if ($organization->organization_address) {
                    $address_line = explode(',', $organization->organization_address);
                    $organization->about1 = 'Sitting at the graceful service center of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at' . $address_line[1] . ',' . $address_line[2] . '.';
                } else {
                    $organization->about1 = 'Sitting at the graceful service center of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at ' . Str::title($organization->city->name) . ', NE.';
                }
            } else {
                if ($organization->organization_address) {
                    $address_line = explode(',', $organization->organization_address);
                    $organization->about1 = 'Positioned at the neighborhood of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at' . $address_line[1] . ',' . $address_line[2] . '.';
                } else {
                    $organization->about1 = 'Positioned at the neighborhood of ' . Str::title($organization->city->name) . ' city, ' . "<strong>$organization->organization_name</strong>" . ' is located at ' . Str::title($organization->city->name) . ', NE.';
                }
            }

            if ($organization->organization_phone_number) {
                $organization->about2 = 'Get a reservation or know necessary information by contacting them at ' . "<a href='tel:$organization->organization_phone_number'>$organization->organization_phone_number</a>" . '.';
            } elseif ($organization->organization_email) {
                $organization->about2 = 'Get a reservation or know necessary information by contacting them at ' . "<strong>$organization->organization_email</strong>" . '.';
            } elseif ($organization->organization_address) {
                $organization->about2 = 'Get a reservation or know necessary information by contacting them at ' . "<strong>$organization->organization_address</strong>" . '.';
            } elseif ($organization->organization_website) {
                $organization->about2 = 'Get a reservation or know necessary information by contacting them at ' . "<strong>$organization->organization_website</strong>" . '.';
            } else {
                $organization->about2 = null;
            }

            $organization->rate_stars = $organization->rate_stars ?? 0;
            $organization->reviews_total_count = $organization->reviews_total_count ?? 0;

            $organization->about3 = "<strong>$organization->organization_name</strong>" . ' has a ' . "<strong>$organization->rate_stars</strong>" . '-star rating and ' . "<strong>$organization->reviews_total_count</strong>" . ' reviews. Check out the photos and customer reviews to make an image in your mind about what to expect there.';

            $organization->reviews_paginator = $organization->reviews()->whereNotNull('review_id')->orderByDesc('id')->paginate(10)->onEachSide(0);
            $organization->nebraska_reviews_paginator = $organization->reviews()->whereNull('review_id')->orderByDesc('id')->paginate(10)->onEachSide(0);

            Meta::setPaginationLinks($organization->reviews_paginator);

            return view('organization.show', compact('organization', 'city', 'cities', 'five_star_reviews', 'four_star_reviews', 'three_star_reviews', 'two_star_reviews', 'one_star_reviews', 'restaurant_type', 'gym_type', 'landscaper_type'));
        }

        abort(404);
    }

    public function claimBusiness($slug)
    {
        $cities = City::all();
        $city = null;
        $organization = Organization::where('slug', $slug)->firstOrFail();

        return view('organization.claim-business', compact('cities', 'city', 'organization'));
    }

    public function claimBusinessProfile(Request $request, $slug)
    {
        $organization = Organization::where('slug', $slug)->firstOrFail();

        if ($organization) {
            if ($organization->city_id == $request->organization_city) {
                $business_mail = $request->business_email . '@' . $organization->organization_website;

                try {
                    Mail::to($business_mail)->send(new ClaimBusinessMail($organization));

                    $organization->claimed_mail = $business_mail;
                    $organization->update();
                    alert()->success('success', 'An email has been sent to your business mail. Please check and confirm your business.');

                    return redirect()->back();

                } catch (\Exception $e) {
                    alert()->error('error', 'Something went wrong. Please try again later.');
                    return redirect()->back();
                }
            } else {
                alert()->warning('No Found', 'This business is not available in this state!');
                return redirect()->back();
            }
        }
        abort(404);
    }

    public function confirmClaimBusiness($slug)
    {
        $organization = Organization::where('slug', $slug)->firstOrFail();
        if ($organization) {
            $organization->is_claimed = 1;
            $organization->update();

            try {
                Mail::to($organization->claimed_mail)->send(new ClaimedBusiness($organization));
                Mail::to(env('SUPPORT_MAIL_ADDRESS'))->send(new ClaimedNotificationToAdmin($organization));
                alert()->success('success', 'Your business has been claimed successfully. You may now sign up using the same email associated with your business and log in to your account.');

                return redirect()->route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]);

            } catch (\Exception $e) {
                alert()->error('error', 'Something went wrong. Please try again later.');
                return redirect()->back();
            }
        }

        abort(404);
    }

    public function contactForClaimBusiness($slug)
    {
        $cities = City::all();
        $city = null;
        $organization = Organization::where('slug', $slug)->firstOrFail();

        return view('organization.contact-for-claim-business', compact('cities', 'city', 'organization'));
    }

    public function storeContactForClaimBusiness(Request $request, $slug)
    {
        $request->validate([
            'contact_email' => 'required|email',
            'editable_information' => 'required',
            'validation_images.*' => 'required|mimes:jpg,jpeg,png'
        ]);

        $organization = Organization::where('slug', $slug)->firstOrFail();

        if ($organization) {
            $claimed_contact = ContactForClaimBusiness::where('organization_id', $organization->id)->exists();

            if ($claimed_contact) {
                alert()->warning('warning', 'You have already submitted a request for this business. Please wait for the admin to contact you.')->autoClose(50000);
                return redirect()->back();
            }

            if ($request->hasFile('validation_images')) {
                $images = [];
                foreach ($request->file('validation_images') as $image) {
                    $path = $image->store('public/images/claim-business');
                    $images[] = [
                        'url' => Storage::url($path),
                        'name' => $image->getClientOriginalName(),
                        'mime_type' => $image->getClientMimeType(),
                    ];
                }
            }

            $contact_for_claim_business = new ContactForClaimBusiness();
            $contact_for_claim_business->organization_id = $organization->id;
            $contact_for_claim_business->contact_email = $request->contact_email;
            $contact_for_claim_business->contact_number = $request->contact_number;
            $contact_for_claim_business->editable_information = $request->editable_information;
            if ($request->hasFile('validation_images')) {
                $contact_for_claim_business->validation_images = json_encode($images);
            }
            $contact_for_claim_business->save();

            try {
                Mail::to($request->contact_email)->send(new ContactForClaimToUser($organization));
                Mail::to(env('SUPPORT_MAIL_ADDRESS'))->send(new ContactForClaimToAdmin($organization));
            } catch (\Exception $e) {
                alert()->error('error', 'Something went wrong. Please try again later.');
                return redirect()->back();
            }

            alert()->success('success', 'Your request has been submitted successfully. the administrator will contact you soon.')->autoClose(50000);

            return redirect()->back();
        }

        abort(404);
    }

    public function import()
    {
        $category_directories = File::directories('H:\sc v4');

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
