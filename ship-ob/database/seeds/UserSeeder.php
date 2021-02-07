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
        factory(App\User::class, 5)->create()->each(function($user) {
            $user->avatarImage()->save(factory(App\Image::class)->make());
            $user->heroes()->save(factory(App\Hero::class)->create());
        });
    }
}
