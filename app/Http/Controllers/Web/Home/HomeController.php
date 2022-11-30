<?php

namespace App\Http\Controllers\Web\Home;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->guard('user_web')->check()) {
            return redirect()->route('user.web.dashboard.index');
        }

        if (auth()->guard('employee_web')->check()) {
            return redirect()->route('employee.web.dashboard.index');
        }

        return view('home.modules.index.index');
    }
}
