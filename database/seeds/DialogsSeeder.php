<?php

use Illuminate\Database\Seeder;
use App\Models\Dialog;

class DialogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dialogs')->delete();
        Dialog::create([
            'user_id' => '1',
            'friend_id' => '2'
        ]);
        Dialog::create([
            'user_id' => '2',
            'friend_id' => '1'
        ]);
        Dialog::create([
            'user_id' => '1',
            'friend_id' => '3'
        ]);
        Dialog::create([
            'user_id' => '3',
            'friend_id' => '1'
        ]);
        Dialog::create([
            'user_id' => '2',
            'friend_id' => '4'
        ]);
        Dialog::create([
            'user_id' => '4',
            'friend_id' => '2'
        ]);
        Dialog::create([
            'user_id' => '3',
            'friend_id' => '4'
        ]);
        Dialog::create([
            'user_id' => '4',
            'friend_id' => '3'
        ]);
        Dialog::create([
            'user_id' => '4',
            'friend_id' => '8'
        ]);
        Dialog::create([
            'user_id' => '8',
            'friend_id' => '4'
        ]);
        Dialog::create([
            'user_id' => '4',
            'friend_id' => '10'
        ]);
        Dialog::create([
            'user_id' => '10',
            'friend_id' => '4'
        ]);
        Dialog::create([
            'user_id' => '5',
            'friend_id' => '9'
        ]);
        Dialog::create([
            'user_id' => '9',
            'friend_id' => '5'
        ]);
        Dialog::create([
            'user_id' => '5',
            'friend_id' => '6'
        ]);
        Dialog::create([
            'user_id' => '6',
            'friend_id' => '5'
        ]);
        Dialog::create([
            'user_id' => '6',
            'friend_id' => '8'
        ]);
        Dialog::create([
            'user_id' => '8',
            'friend_id' => '6'
        ]);
        Dialog::create([
            'user_id' => '6',
            'friend_id' => '10'
        ]);
        Dialog::create([
            'user_id' => '10',
            'friend_id' => '6'
        ]);
        Dialog::create([
            'user_id' => '7',
            'friend_id' => '1'
        ]);
        Dialog::create([
            'user_id' => '1',
            'friend_id' => '7'
        ]);
        Dialog::create([
            'user_id' => '8',
            'friend_id' => '2'
        ]);
        Dialog::create([
            'user_id' => '2',
            'friend_id' => '8'
        ]);
        Dialog::create([
            'user_id' => '9',
            'friend_id' => '2'
        ]);
        Dialog::create([
            'user_id' => '2',
            'friend_id' => '9'
        ]);
        Dialog::create([
            'user_id' => '10',
            'friend_id' => '5'
        ]);
        Dialog::create([
            'user_id' => '5',
            'friend_id' => '10'
        ]);
    }
}
