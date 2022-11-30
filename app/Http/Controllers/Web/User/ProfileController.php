<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.modules.profile.index.index');
    }
}
