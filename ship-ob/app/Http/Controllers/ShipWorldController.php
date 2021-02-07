<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\User;
use App\Hero;
use App\World;

class ShipWorldController extends Controller
{
    public function index(Request $request)
    {
        $idWorld = 1;

        $user = Auth::user();

        $h = [];
        if ($user) {

            // $h = $user->heroes->toJson();
        }


        $worldInfo = [];

        $world = World::find($idWorld);
        $heroes = Hero::get();
        

        $worldInfo['world'] = [
            'name' => $world->name,
            'desc' => $world->desc,
        ];

        foreach ($heroes as $i => $h) {
            $worldInfo['heroes'][] = [
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
        $request->validate([
            'id' => ['required', 'numeric'],
            'x' => ['required', 'numeric'],
            'y' => ['required', 'numeric'],
        ]);
        
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
