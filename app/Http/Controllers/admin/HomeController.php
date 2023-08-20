<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        $organization_count = Organization::count();

        return view('admin.dashboard.dashboard', compact('organization_count'));
    }
}
