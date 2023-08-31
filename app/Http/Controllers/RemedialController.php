<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemedialController extends Controller
{
    public function index() {
        return view('ujian.remedial');
    }
}
