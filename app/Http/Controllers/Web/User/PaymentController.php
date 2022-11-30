<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return view('user.modules.payment.index.index');
    }
}
