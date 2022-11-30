<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('user.modules.employee.index.index');
    }

    public function personalInformation(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.personalInformation.index', [
                'id' => $request->id
            ]);
        }
    }

    public function position(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.position.index', [
                'id' => $request->id
            ]);
        }
    }

    public function permit(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.permit.index', [
                'id' => $request->id
            ]);
        }
    }

    public function overtime(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.overtime.index', [
                'id' => $request->id
            ]);
        }
    }

    public function payment(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.payment.index', [
                'id' => $request->id
            ]);
        }
    }

    public function device(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.device.index', [
                'id' => $request->id
            ]);
        }
    }

    public function file(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.file.index', [
                'id' => $request->id
            ]);
        }
    }

    public function shift(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.shift.index', [
                'id' => $request->id
            ]);
        }
    }

    public function punishment(Request $request)
    {
        if (!$request->id) {
            abort(404);
        } else {
            return view('user.modules.employee.punishment.index', [
                'id' => $request->id
            ]);
        }
    }
}
