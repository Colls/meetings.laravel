<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('UsersSeeder');
        $this->call('AvatarsSeeder');
        $this->call('InterestsSeeder');
        $this->call('HobbiesSeeder');
        $this->call('FriendsSeeder');

        Model::reguard();
    }
}
