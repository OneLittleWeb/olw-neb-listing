<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AwardCertificateRequest;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function awardCertificateRequest()
    {
        $award_certificate_requests = AwardCertificateRequest::whereNull('deleted_at')->latest()->get();

        return view('admin.award.award_certificate_request', compact('award_certificate_requests'));
    }

    public function awardCertificateUpdate($id, $status)
    {
        $award_certificate = AwardCertificateRequest::find($id);

        if ($award_certificate) {
            if ($status == 'approved') {

                $award_certificate->award_status = 1;
                $award_certificate->update();

                alert()->success('success', 'Award certificate request has been approved.');
            } elseif ($status == 'rejected') {

                $award_certificate->award_status = 2;
                $award_certificate->update();

                alert()->success('success', 'Award certificate request has been rejected.');
            } elseif ($status == 'deleted') {

                $award_certificate->delete();

                alert()->success('success', 'Award certificate request has been deleted.');
            }
            return back();
        }

        abort(404);
    }
}
