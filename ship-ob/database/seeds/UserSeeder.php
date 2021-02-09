<?php

use Illuminate\Database\Seeder;

// use App\User;
// use App\Hero;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create([
            'email' => 'user@example.com'
        ]);

        $world = factory(App\World::class)->make();
        $user->worlds()->save($world);

        $user->heroes()->save(factory(App\Hero::class)->make([
            'world_id' => $world->id,
        ]));



        factory(App\User::class, 5)->create()->each(function($user) use ($world) {
            $user->avatarImage()->save(factory(App\Image::class)->make());
            $user->heroes()->save(factory(App\Hero::class)->make([
                'world_id' => $world->id,
            ]));
        });
    }
}
