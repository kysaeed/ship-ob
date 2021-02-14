<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\World;
use App\Hero;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $worldList = [];
        foreach ($user->heroes as $h) {
            $worldList[] = [
                'id' => $h->world->id,
                'name' => $h->world->name,
                'desc' => $h->world->desc,
                'heroCount' => $h->world->heroes()->count(),
                'url' => route('world.view', ['idWorld' => $h->world->id]),
            ];
        }

        return view('home', [
            'heroes' => $user->heroes,
            'worldList' => $worldList,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        $user = Auth::user();
        if (is_null($user)) {
            return [];
        }

        if (is_null($request->input('id'))) {
            DB::transaction(function() use ($request, $user) {
                if ($user->worlds()->count() >= 10) {
                    return;
                }

                $world = new World(
                    $request->all(),
                );

                $user->worlds()->save($world);
                $hero = new Hero([
                    'x' => 123,
                    'y' => 123,
                ]);
                $hero->world_id = $world->id;
                $user->heroes()->save($hero);
            });
        }
        
        return [
            'isSuccess' => true,
        ];
    }
}
