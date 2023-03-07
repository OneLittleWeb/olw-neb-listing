<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryBusiness($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $categories = Category::all();
            $organizations = Organization::where('category_id', $category->id)->paginate(10)->onEachSide(0);

            return view('organization.index', compact('organizations', 'category','categories'));
        }

        abort(404);
    }
}
