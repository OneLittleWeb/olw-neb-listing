<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ImportOrganization implements WithMultipleSheets
{
    protected $county_name;
    protected $city_id;

    public function __construct($county_name, $city_id)
    {
        $this->county_name = $county_name;
        $this->city_id = $city_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function sheets(): array
    {
        return [
            new FirstSheetImporter($this->county_name, $this->city_id),
            new SecondSheetImporter(),
        ];
    }
}
