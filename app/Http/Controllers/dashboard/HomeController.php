<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index() {
        $users = User::where('isAdmin', '0')->get();
        return view('dashboard', compact(['users']));
    }
}
