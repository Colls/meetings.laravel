<?php

use Illuminate\Database\Seeder;
use App\Models\Friend;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->delete();
        Friend::create([
            'user_id' => '1',
            'friend_id' => '1',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '1',
            'friend_id' => '2',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '1',
            'friend_id' => '3',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '3',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '7',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '8',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '5',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '10',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '7',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '5',
            'friend_id' => '1',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '5',
            'friend_id' => '2',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '1',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '5',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '8',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '10',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '8',
            'friend_id' => '6',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '8',
            'friend_id' => '2',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '8',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '10',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '10',
            'friend_id' => '2',
            'status' => 'init'
        ]);
        Friend::create([
            'user_id' => '10',
            'friend_id' => '3',
            'status' => 'approved'
        ]);
    }
}
