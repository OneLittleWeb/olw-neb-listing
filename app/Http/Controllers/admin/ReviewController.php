<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class ReviewController extends Controller
{
    public function reviewBusiness(Request $request)
    {
        if ($request->ajax()) {
            $data = Organization::orderByDesc('rate_stars')->get();
            return Datatables::of($data)
                ->editColumn('organization_name', function ($organization) {
                    return '<a href="' . route('admin.reviews.business') . '">' . $organization->organization_name . '</a>';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">All Reviews</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'organization_name'])
                ->make(true);
        }
        return view('admin.reviews.organization');
    }

    public function reviews()
    {
        $reviews = Review::latest()->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }
}
