<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $students = User::where('role','student')->get()->count();
        $corporates = User::where('role','corporate')->get()->count();
        
        return view('admin.pages.dashboard.dashboard')->with('students',$students)->with('corporates',$corporates);
    }
}
