<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsAuthController extends Controller
{
    public function index() {
        return view('login.loginmhs');
    }
}
