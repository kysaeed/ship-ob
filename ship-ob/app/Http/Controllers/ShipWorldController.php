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
    public function index(Request $request, $idWorld)
    {
        $idWorld = 1;

        $user = Auth::user();

        $h = [];
        if ($user) {
            
            // $h = $user->heroes->toJson();
        }


        $worldInfo = [];

        $world = World::find($idWorld);
        if (is_null($world)) {
            return '';
        }
        
        $heroes = $world->heroes()->orderBy('id')->get();
        

        $worldInfo['world'] = [
            'name' => $world->name,
            'desc' => $world->desc,
        ];


        foreach ($heroes as $i => $h) {
            if (is_null($h->user->avatarImage)) {
                $avatar = 'img/avatar1.png';
            } else {
                $avatar = Storage::disk('public')->url($h->user->avatarImage->file);
            }
            $worldInfo['heroes'][] = [
                'id' => $h->id,
                'name' => $h->user->name,
                'x' => $h->x,
                'y' => $h->y,
                'avatar' => asset($avatar),
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


        $h = Auth::user()->heroes()->first();
        // $h = Hero::find($request->input('id')); // TEST

        $h->x = $request->input('x');
        $h->y = $request->input('y');
        
        $h->save();


        return $h;
    }

    public function getWorldData($world)
    {

    }
}
