<?php

namespace App\Imports;

use App\Models\Review;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SecondSheetImporter implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Review([
            'organization_guid' => $row[13],
            'organization_gmaps_id' => $row[12],
            'review_id' => $row[1],
            'reviewer_name' => $row[2],
            'reviewer_profile_link' => $row[3],
            'reviewer_reviews_count' => $row[4],
            'review_date' => $row[5],
            'review_rate_stars' => $row[6],
            'review_text_original' => $row[7],
            'reviewer_avatar_url' => $row[9],
            'review_photos_files' => $row[10],
            'review_photos_urls' => $row[7],
            'review_thumbs_up_value' => $row[14],
        ]);
    }
}
