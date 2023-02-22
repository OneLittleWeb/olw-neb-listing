<?php

namespace App\Http\Controllers;

use App\Imports\ImportOrganization;
use App\Models\Organization;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

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
        $folders = File::directories('F:\nebraska');

        foreach ($folders as $folder) {
            $files = File::files($folder);
            Excel::import(new ImportOrganization, $files[0]);
        }

        return redirect()->back();
    }
}
