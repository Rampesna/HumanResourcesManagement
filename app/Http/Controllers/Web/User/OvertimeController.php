<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class OvertimeController extends Controller
{
    public function index()
    {
        return view('user.modules.overtime.index.index');
    }
}
