<?php

namespace App\Http\Controllers\Web\Employee;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('employee.modules.dashboard.index.index');
    }
}
