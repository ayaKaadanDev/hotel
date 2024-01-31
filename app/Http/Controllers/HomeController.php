<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                return view('dashboard.adminDashboard');
            }
            elseif(Auth::user()->status==1)
            {
                return view('dashboard.chiefDashboard');
            }
            elseif(Auth::user()->status==2)
            {
                return view('dashboard.receptionDashboard');
            }
            else
            {
                return view('dashboard.clientDashboard');
            }

        }
        else
        {
            return redirect()->back();
        }
    }
}
