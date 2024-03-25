<?php
namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('lks.admin.dashboard');
    }
}
