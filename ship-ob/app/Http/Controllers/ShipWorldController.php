<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ShipWorldController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

// dd($user->heroes->toJson());
        $h = '{}';
        if ($user) {
            $h = $user->heroes->toJson();
        }
        return view('wel2', [
            'worldInfo' => $h,
        ]);
    }

    public function getWorldData($world)
    {

    }
}
