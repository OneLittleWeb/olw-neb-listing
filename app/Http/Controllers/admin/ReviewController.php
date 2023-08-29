<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function reviewBusiness(Request $request)
    {
        if ($request->ajax()) {
            $data = Organization::where('reviews_total_count', '!=', null)->orderByDesc('rate_stars')->latest();
            return Datatables::of($data)
                ->editColumn('organization_name', function ($organization) {
                    return '<a href="' . route('admin.reviews', $organization->organization_guid) . '">' . $organization->organization_name . '</a>';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($organization) {
                    return '<a href="' . route('admin.reviews', $organization->organization_guid) . '" class="edit btn btn-primary btn-sm">Reviews</a>';
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
            $data = Review::where('organization_guid', $slug)->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action', 'organization_name'])
                ->make(true);
        }

        return view('admin.reviews.index', compact('business'));
    }

    public function allReviews(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::latest();

            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    $buttons = '<a href="#" class="btn btn-primary show-modal" data-id="' . $row->id . '">Show</a>';
                    $buttons .= '<a href="#" class="btn btn-success edit-modal" data-id="' . $row->id . '">Edit</a>';
                    $buttons .= '<a href="#" class="btn btn-danger delete-modal" data-id="' . $row->id . '">Delete</a>';
                    return $buttons;
                })
                ->addColumn('organization_name', function ($row) {
                    return $row->organization->organization_name;
                })
                ->addColumn('review_date', function ($row) {
                    return $row->review_date ?: $row->created_at;
                })
                ->addIndexColumn()
                ->rawColumns(['actions'])
                ->toJson();
        }
        return view('admin.reviews.all_reviews');
    }
}
