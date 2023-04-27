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

    public function contactForClaimBusiness()
    {
        $all_contacts_for_claim = ContactForClaimBusiness::latest()->get();

        return view('admin.contact.contact_for_claim', compact('all_contacts_for_claim'));
    }

    public function ClaimStatusUpdate($id, $status)
    {
        $claimed_business = ContactForClaimBusiness::find($id);

        if ($claimed_business) {
            if ($status == 'approved') {
                $organization = $claimed_business->organization;
                $organization->is_claimed = 1;
                $organization->update();
                $claimed_business->delete();

                alert()->success('success', 'The business claim has been approved.');
                return redirect()->back();
            } else {
                $claimed_business->delete();
                alert()->success('success', 'The business claim has been rejected.');
                return redirect()->back();
            }
        }

        abort(404);
    }
}
