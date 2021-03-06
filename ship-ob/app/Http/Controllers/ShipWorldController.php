<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use DB;

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

        return DB::transaction(function () use ($user, $idWorld) {
            $worldInfo = $this->getWorldData($user, $idWorld);
            return view('world_view', [
                'worldInfo' => $worldInfo,
            ]);
        });
    }

    public function ajaxMove(Request $request, $idWorld)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'x' => ['required', 'numeric'],
            'y' => ['required', 'numeric'],
        ]);

        
        $h = Auth::user()->heroes()->inWorld($idWorld)->lockForUpdate()->first();
        if (is_null($h)) {
            return [];
        }

        $h->x = $request->input('x');
        $h->y = $request->input('y');
        
        $h->save();


        return $h;
    }

    public function ajaxUpdate(Request $request, $idWorld)
    {
        $user = Auth::user();

        $isExists = $user->heroes()->inWorld($idWorld)->exists();
        if (!$isExists) {
            return [];
        }

        $worldInfo = $this->getWorldData($user, $idWorld);

        return $worldInfo;
    }

    public function getWorldData($user, $idWorld)
    {

        $world = World::find($idWorld);

        $worldInfo = [];
        $worldInfo['world'] = [
            'id' => $world->id,
            'name' => $world->name,
            'desc' => $world->desc,
        ];


        $index = -1;
        $heroes = $world->heroes()->sharedLock()->orderBy('id')->get();
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
                'position' => [
                    'x' => $h->x,
                    'y' => $h->y,
                ],
                'avatar' => asset($avatar),
            ];
        }
        $worldInfo['index'] = $index;

        return $worldInfo;
    }
}
