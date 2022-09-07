<?php

namespace App\Http\Controllers;

use App\Models\WorldCity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $city = WorldCity::select('id', 'name')->orderBy('id', 'desc')->get();
        \View::share('city', $city);
    }
}
