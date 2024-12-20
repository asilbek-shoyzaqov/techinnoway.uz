<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MemberFrontController extends Controller
{
    public function index()
    {
        $member = Auth::guard ('member')->user ();
        return view ('member.index', compact('member'));
    }
}
