<?php

use Illuminate\Database\Seeder;
use App\Models\Avatar;

class AvatarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->delete();
        Avatar::create([
            'avatar' => '561baf0851658.jpg',
            'user_id' => '1',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561baf2a8ef80.jpg',
            'user_id' => '2',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561baf3f401c8.jpg',
            'user_id' => '3',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561baf5034328.jpg',
            'user_id' => '4',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561baf61c8258.jpg',
            'user_id' => '5',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561baf7489be8.jpg',
            'user_id' => '6',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561bafb51b008.jpg',
            'user_id' => '7',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561bafca5ceb8.jpg',
            'user_id' => '8',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561bafdd170c0.jpg',
            'user_id' => '9',
            'active' => '1'
        ]);
        Avatar::create([
            'avatar' => '561bafefbfa68.jpg',
            'user_id' => '10',
            'active' => '1'
        ]);
    }
}
