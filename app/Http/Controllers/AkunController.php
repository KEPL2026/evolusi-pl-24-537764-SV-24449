<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AkunController extends Controller
{
    public function index(Request $request): View
    {
        return view('akun', [
            'pengguna' => $request->user(),
        ]);
    }
}
