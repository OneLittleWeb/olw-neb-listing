<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Review;
use Illuminate\Http\Request;
use DataTables;

class ReviewController extends Controller
{
    public function reviewBusiness(Request $request)
    {
        if ($request->ajax()) {
            $data = Organization::where('reviews_total_count', '!=', null)->orderByDesc('rate_stars')->get();
            return Datatables::of($data)
                ->editColumn('organization_name', function ($organization) {
                    return '<a href="' . route('admin.reviews', $organization->organization_guid) . '">' . $organization->organization_name . '</a>';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($organization) {
                    $btn = '<a href="' . route('admin.reviews', $organization->organization_guid) . '" class="edit btn btn-primary btn-sm">All Reviews</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'organization_name'])
                ->make(true);
        }
        return view('admin.reviews.organization');
    }

    public function reviews(Request $request, $slug)
    {
        $business = Organization::where('organization_guid', $slug)->first();

        if ($request->ajax()) {
            $data = Review::where('organization_guid', $slug)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action', 'organization_name'])
                ->make(true);
        }

        return view('admin.reviews.index',compact('business'));
    }
}
