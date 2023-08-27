<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "resume" => Resume::where('user_id', auth()->id())->get(),
        ]);
    }

    public function template()
    {
        return view('dashboard.template');
    }
}
