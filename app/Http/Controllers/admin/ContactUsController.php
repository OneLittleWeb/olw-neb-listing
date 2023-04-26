<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactForClaimBusiness;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function ClaimStatusEdit($id)
    {
        Alert::warning('Are you sure?', 'This action cannot be undone.')
            ->showConfirmButton('Yes, delete it!', '#3085d6')
            ->showCancelButton('No, cancel', '#aaa');

        return redirect()->route('admin.contact.for.claim');
    }

    public function ClaimStatusUpdate($id, $status)
    {
        dd($status);
    }
}
