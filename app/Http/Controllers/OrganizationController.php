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

        Excel::import(new ImportOrganization, $file_path);

        return redirect()->back();
    }
}
