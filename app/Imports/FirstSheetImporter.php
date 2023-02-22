<?php

namespace App\Imports;

use App\Models\Organization;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class FirstSheetImporter implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    protected $city_name;

    public function __construct($city_name)
    {
        $this->city_name = $city_name;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new Organization([
            'county' => 'Nebraska',
            'city' => $this->city_name,
            'gmaps_link' => (!empty($row[1])) ? $row[1] : ' ',
            'organization_name' => (!empty($row[2])) ? $row[2] : ' ',
            'organization_gmaps_id' => (!empty($row[3])) ? $row[3] : ' ',
            'rate_stars' => (!empty($row[4])) ? $row[4] : ' ',
            'reviews_total_count' => (!empty($row[5])) ? $row[5] : ' ',
            'organization_category' => (!empty($row[7])) ? $row[7] : ' ',
            'organization_address' => (!empty($row[8])) ? $row[8] : ' ',
            'organization_website' => (!empty($row[10])) ? $row[10] : ' ',
            'organization_phone_number' => (!empty($row[11])) ? $row[11] : ' ',
            'organization_plus_code' => (!empty($row[12])) ? $row[12] : ' ',
            'organization_work_time' => (!empty($row[13])) ? $row[13] : ' ',
            'popular_load_times' => (!empty($row[14])) ? $row[14] : ' ',
            'organization_latitude' => (!empty($row[15])) ? $row[15] : ' ',
            'organization_longitude' => (!empty($row[16])) ? $row[16] : ' ',
            'organization_short_description' => (!empty($row[17])) ? $row[17] : ' ',
            'organization_head_photo_file' => (!empty($row[18])) ? $row[18] : ' ',
            'organization_photos_files' => (!empty($row[20])) ? $row[20] : ' ',
            'organization_email' => (!empty($row[22])) ? $row[22] : ' ',
            'organization_facebook' => (!empty($row[23])) ? $row[23] : ' ',
            'organization_instagram' => (!empty($row[24])) ? $row[24] : ' ',
            'organization_twitter' => (!empty($row[25])) ? $row[25] : ' ',
            'organization_linkedin' => (!empty($row[26])) ? $row[26] : ' ',
            'organization_youTube' => (!empty($row[27])) ? $row[27] : ' ',
            'organization_yelp' => (!empty($row[29])) ? $row[29] : ' ',
            'organization_trip_advisor' => (!empty($row[30])) ? $row[30] : ' ',
            'organization_search_request' => (!empty($row[31])) ? $row[31] : ' ',
            'embed_map_code' => (!empty($row[34])) ? $row[34] : ' ',
            'organization_skype' => (!empty($row[35])) ? $row[35] : ' ',
            'organization_telegram' => (!empty($row[36])) ? $row[36] : ' ',
            'organization_phone_from_the_website' => (!empty($row[37])) ? $row[37] : ' ',
            'organization_guid' => (!empty($row[38])) ? $row[38] : ' ',
            'organization_tiktok' => (!empty($row[39])) ? $row[39] : ' '
        ]);
    }
}
