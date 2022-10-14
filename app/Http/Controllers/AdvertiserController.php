<?php

namespace App\Http\Controllers;

use App\Models\advertiser;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index()
    {
        $ad = advertiser::with('ads')->get();

        return response()->json([
            "status" => 'success',
            "data" => $ad
        ]);
    }
}
