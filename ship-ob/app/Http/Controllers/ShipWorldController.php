<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\User;
use App\Hero;

class ShipWorldController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $h = [];
        if ($user) {

            // $h = $user->heroes->toJson();
        }


        $worldInfo = [];


        $heroes = Hero::get();
        foreach ($heroes as $i => $h) {
            $worldInfo[] = [
                'id' => $h->id,
                'name' => $h->user->name,
                'x' => $h->x,
                'y' => $h->y,
                'avatar' => Storage::disk('public')->url($h->user->avatarImage->file),
            ];
        }

        return view('world_view', [
            'worldInfo' => $worldInfo,
        ]);
    }

    public function ajaxMove(Request $request)
    {
        $h = Hero::find($request->input('id')); // TEST

        $h->x = $request->input('x');
        $h->y = $request->input('y');
        $h->save();


        return $h;
    }

    public function getWorldData($world)
    {

    }
}
