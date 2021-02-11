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
        $user = Auth::user();


        $isExists = $user->heroes()->where('world_id', $idWorld)->exists();
        if (!$isExists) {
            return '';
        }

        $world = World::find($idWorld);
        $heroes = $world->heroes()->orderBy('id')->get();

        $worldInfo = [];
        $worldInfo['world'] = [
            'id' => $world->id,
            'name' => $world->name,
            'desc' => $world->desc,
        ];


        $index = -1;
        foreach ($heroes as $i => $h) {
            if (is_null($h->user->avatarImage)) {
                $avatar = 'img/avatar1.png';
            } else {
                $avatar = Storage::disk('public')->url($h->user->avatarImage->file);
            }
            if ($h->user_id == $user->id) {
                $index = $i;
            }
            $worldInfo['heroes'][] = [
                'id' => $h->id,
                'name' => $h->user->name,
                'x' => $h->x,
                'y' => $h->y,
                'avatar' => asset($avatar),
            ];
        }
        $worldInfo['index'] = $index;
        return view('world_view', [
            'worldInfo' => $worldInfo,
        ]);
    }

    public function ajaxMove(Request $request, $idWorld)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'x' => ['required', 'numeric'],
            'y' => ['required', 'numeric'],
        ]);


        $h = Auth::user()->heroes()->inWorld($idWorld)->first();
        if (is_null($h)) {
            return [];
        }

        $h->x = $request->input('x');
        $h->y = $request->input('y');
        
        $h->save();


        return $h;
    }

    public function getWorldData($world)
    {

    }
}
