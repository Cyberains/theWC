<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function getRandomProducts(){
        return Product::all()->random(10);
    }

    public function getRandomService(){
        return Service::all()->random(10);
    }
}
