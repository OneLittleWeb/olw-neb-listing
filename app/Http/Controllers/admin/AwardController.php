<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AwardCertificateRequest;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function awardCertificateRequest()
    {
        $award_certificate_requests = AwardCertificateRequest::withTrashed()->latest()->get();

        return view('admin.award.award_certificate_request', compact('award_certificate_requests'));
    }
}
