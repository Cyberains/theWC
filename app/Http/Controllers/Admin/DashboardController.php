<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Alert;
use Session;

class DashboardController extends Controller
{

    public function index(){

    	return view('admin.dashboard');
    }
}
