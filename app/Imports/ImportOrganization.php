<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ImportOrganization implements WithMultipleSheets
{
    protected $county_name;
    protected $city_name;

    public function __construct($county_name, $city_name)
    {
        $this->county_name = $county_name;
        $this->city_name = $city_name;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function sheets(): array
    {
        return [
            new FirstSheetImporter($this->county_name, $this->city_name),
            new SecondSheetImporter(),
        ];
    }
}
