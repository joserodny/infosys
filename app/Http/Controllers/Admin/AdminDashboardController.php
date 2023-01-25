<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.Dashboard');
    }
    public function feed()
    {
        return view('AdminDashboard.Pages.feed');
    }



}

