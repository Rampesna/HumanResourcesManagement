<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class PermitController extends Controller
{
    public function index()
    {
        return view('user.modules.permit.index.index');
    }
}
