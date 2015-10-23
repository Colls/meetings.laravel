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
            'friend_id' => '2',
            'initiator_id' => '1',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '1',
            'initiator_id' => '1',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '1',
            'friend_id' => '3',
            'initiator_id' => '1',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '1',
            'initiator_id' => '1',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '1',
            'initiator_id' => '4',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '1',
            'friend_id' => '4',
            'initiator_id' => '4',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '3',
            'initiator_id' => '2',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '2',
            'initiator_id' => '2',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '9',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '2',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '4',
            'initiator_id' => '3',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '3',
            'initiator_id' => '3',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '5',
            'initiator_id' => '3',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '5',
            'friend_id' => '3',
            'initiator_id' => '3',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '5',
            'friend_id' => '6',
            'initiator_id' => '5',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '5',
            'initiator_id' => '5',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '5',
            'friend_id' => '7',
            'initiator_id' => '5',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '5',
            'initiator_id' => '5',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '3',
            'initiator_id' => '6',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '6',
            'initiator_id' => '6',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '7',
            'initiator_id' => '6',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '6',
            'initiator_id' => '6',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '4',
            'initiator_id' => '7',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '7',
            'initiator_id' => '7',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '1',
            'initiator_id' => '7',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '1',
            'friend_id' => '7',
            'initiator_id' => '7',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '8',
            'friend_id' => '7',
            'initiator_id' => '8',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '8',
            'initiator_id' => '8',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '8',
            'friend_id' => '9',
            'initiator_id' => '8',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '8',
            'initiator_id' => '8',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '8',
            'friend_id' => '10',
            'initiator_id' => '8',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '10',
            'friend_id' => '8',
            'initiator_id' => '8',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '4',
            'initiator_id' => '9',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '4',
            'friend_id' => '9',
            'initiator_id' => '9',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '6',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '6',
            'friend_id' => '9',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '9',
            'friend_id' => '3',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '3',
            'friend_id' => '9',
            'initiator_id' => '9',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '10',
            'friend_id' => '2',
            'initiator_id' => '10',
            'status' => 'subscription'
        ]);
        Friend::create([
            'user_id' => '2',
            'friend_id' => '10',
            'initiator_id' => '10',
            'status' => 'proposal'
        ]);
        Friend::create([
            'user_id' => '10',
            'friend_id' => '7',
            'initiator_id' => '10',
            'status' => 'approved'
        ]);
        Friend::create([
            'user_id' => '7',
            'friend_id' => '10',
            'initiator_id' => '10',
            'status' => 'approved'
        ]);
    }
}
