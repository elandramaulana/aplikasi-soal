<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index() {
        $matkul = DB::table('matkul')->get();
        return view('dashboard.admin',['matkul'=>$matkul]);
    }
}
