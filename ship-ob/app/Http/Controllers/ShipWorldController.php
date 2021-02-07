<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

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
            $avatar = 'avatar' . (1 + ($i % 2)) . '.png';
            $worldInfo[] = [
                'id' => $h->id,
                'name' => $h->user->name, //"user-{$i}",
                'x' => $h->x,
                'y' => $h->y,
                'avatar' => Storage::disk('public')->url($h->user->avatarImage->file), //asset("img/{$avatar}"),
            ];
        }

        return view('world_view', [
            'worldInfo' => $worldInfo,
        ]);
    }

    public function getWorldData($world)
    {

    }
}
