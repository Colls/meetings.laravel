<?php

use Illuminate\Database\Seeder;
use App\Models\Interests;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->delete();
        Interests::create([
            'name' => 'Музыка'
        ]);
        Interests::create([
            'name' => 'Кино'
        ]);
        Interests::create([
            'name' => 'Спорт'
        ]);
        Interests::create([
            'name' => 'Литература'
        ]);
        Interests::create([
            'name' => 'Компьютерные игры'
        ]);
        Interests::create([
            'name' => 'Дизайн'
        ]);
        Interests::create([
            'name' => 'Фотография'
        ]);
        Interests::create([
            'name' => 'Танцы'
        ]);
        Interests::create([
            'name' => 'Моделирование'
        ]);
        Interests::create([
            'name' => 'Туризм'
        ]);
        Interests::create([
            'name' => 'Техника'
        ]);

    }
}
