<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactForClaimBusiness;
use App\Models\Organization;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.contact.index');
    }

    public function contactForClaimBusiness(Request $request)
    {
//        if ($request->ajax()) {
//            $data = ContactForClaimBusiness::latest()->get();
//            return Datatables::of($data)
//                ->addIndexColumn()
//                ->make(true);
//        }

        $all_contacts_for_claim = ContactForClaimBusiness::latest()->get();

        return view('admin.contact.contact_for_claim', compact('all_contacts_for_claim'));
    }
}
