<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews()
    {
        $organizations = Review::latest()->paginate(10);

        return view('admin.reviews.index',compact('organizations'));
    }
}
