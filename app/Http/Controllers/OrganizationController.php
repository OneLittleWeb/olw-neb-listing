<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Models\Organization;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function import(Request $request)
    {
        $file_path = $request->file('file');

        $organizations = Excel::toArray([], $file_path)[0];

        foreach ($organizations as $organization) {
            $organization = [
                'slug' => 'abie',
                'county' => 'nebraska',
                'city' => 'abie',
                'gmaps_link' => $organization[1],
                'organization_name' => $organization[2],
                'Organization_gmaps_id' => $organization[3],
                'rate_stars' => $organization[4],
                'reviews_total_count' => $organization[5],
                'organization_category' => $organization[7],
                'organization_address' => $organization[8],
                'organization_website' => $organization[10],
                'organization_phone_number' => $organization[11],
                'organization_plus_code' => $organization[12],
                'organization_work_time' => $organization[13],
                'popular_load_times' => $organization[14],
                'organization_latitude' => $organization[15],
                'organization_longitude' => $organization[16],
                'organization_short_description' => $organization[17],
                'organization_head_photo_file' => $organization[18],
                'organization_photos_files' => $organization[20],
                'organization_email' => $organization[22],
                'organization_facebook' => $organization[23],
                'organization_instagram' => $organization[24],
                'organization_twitter' => $organization[25],
                'organization_linkedin' => $organization[26],
                'organization_youTube' => $organization[27],
                'organization_yelp' => $organization[29],
                'organization_trip_advisor' => $organization[30],
                'organization_search_request' => $organization[31],
                'embed_map_code' => $organization[34],
                'organization_skype' => $organization[35],
                'organization_telegram' => $organization[36],
                'organization_phone_from_the_website' => $organization[37],
                'organization_guid' => $organization[38],
                'organization_tiktok' => $organization[39],
            ];

            Organization::create($organization);
        }

//        Excel::import(new ImportOrganization, $file_path->store('files'));
        return redirect()->back();
    }
}
