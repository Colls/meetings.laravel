<?php

use Illuminate\Database\Seeder;
use App\Models\Hobby;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->delete();
        Hobby::create([
            'user_id' => '1',
            'interest_id' => '1',
        ]);
        Hobby::create([
            'user_id' => '1',
            'interest_id' => '2',
        ]);
        Hobby::create([
            'user_id' => '1',
            'interest_id' => '3',
        ]);
        Hobby::create([
            'user_id' => '2',
            'interest_id' => '1',
        ]);
        Hobby::create([
            'user_id' => '2',
            'interest_id' => '2',
        ]);
        Hobby::create([
            'user_id' => '3',
            'interest_id' => '3',
        ]);
        Hobby::create([
            'user_id' => '4',
            'interest_id' => '4',
        ]);
        Hobby::create([
            'user_id' => '4',
            'interest_id' => '5',
        ]);
        Hobby::create([
            'user_id' => '5',
            'interest_id' => '5',
        ]);
        Hobby::create([
            'user_id' => '5',
            'interest_id' => '1',
        ]);
        Hobby::create([
            'user_id' => '5',
            'interest_id' => '6',
        ]);
        Hobby::create([
            'user_id' => '5',
            'interest_id' => '7',
        ]);
        Hobby::create([
            'user_id' => '6',
            'interest_id' => '1',
        ]);
        Hobby::create([
            'user_id' => '6',
            'interest_id' => '3',
        ]);
        Hobby::create([
            'user_id' => '7',
            'interest_id' => '5',
        ]);
        Hobby::create([
            'user_id' => '7',
            'interest_id' => '8',
        ]);
        Hobby::create([
            'user_id' => '7',
            'interest_id' => '9',
        ]);
        Hobby::create([
            'user_id' => '8',
            'interest_id' => '9',
        ]);
        Hobby::create([
            'user_id' => '8',
            'interest_id' => '8',
        ]);
        Hobby::create([
            'user_id' => '8',
            'interest_id' => '10',
        ]);
        Hobby::create([
            'user_id' => '9',
            'interest_id' => '11',
        ]);
        Hobby::create([
            'user_id' => '10',
            'interest_id' => '11',
        ]);
    }
}
