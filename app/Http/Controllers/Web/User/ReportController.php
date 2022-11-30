<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('user.modules.report.index.index');
    }

    public function ageAndGender()
    {
        return view('user.modules.report.ageAndGender.index');
    }

    public function education()
    {
        return view('user.modules.report.education.index');
    }

    public function bloodGroup()
    {
        return view('user.modules.report.bloodGroup.index');
    }

    public function permit()
    {
        return view('user.modules.report.permit.index');
    }

    public function overtime()
    {
        return view('user.modules.report.overtime.index');
    }

    public function payment()
    {
        return view('user.modules.report.payment.index');
    }

    public function annualPermit()
    {
        return view('user.modules.report.annualPermit.index');
    }
}
