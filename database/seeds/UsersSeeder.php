<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'first_name' => 'Анна',
            'last_name' => 'Бобенко',
            'gender' => 'f',
            'married' => 0,
            'birth_date' => '1988-07-19',
            'email' => 'Anna@bobenko.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bab048c10'
        ]);
        User::create([
            'first_name' => 'Борис',
            'last_name' => 'Левин',
            'gender' => 'm',
            'married' => 0,
            'birth_date' => '1987-04-25',
            'email' => 'Boris@levin.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bacfc92c0'
        ]);
        User::create([
            'first_name' => 'Глеб',
            'last_name' => 'Романенко',
            'gender' => 'm',
            'married' => 0,
            'birth_date' => '1987-01-25',
            'email' => 'Gleb@romanenko.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bb227b4a8'
        ]);
        User::create([
            'first_name' => 'Семён',
            'last_name' => 'Лобанов',
            'gender' => 'm',
            'married' => 0,
            'birth_date' => '1986-12-25',
            'email' => 'Semen@lobanov.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bb3ee7720'
        ]);
        User::create([
            'first_name' => 'Фил',
            'last_name' => 'Ричардс',
            'gender' => 'm',
            'married' => 0,
            'birth_date' => '1987-05-26',
            'email' => 'Phil@richards.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bb5bdcb40'
        ]);
        User::create([
            'first_name' => 'Варвара',
            'last_name' => 'Черноус',
            'gender' => 'f',
            'married' => 0,
            'birth_date' => '1988-08-26',
            'email' => 'Varya@chernous.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bb771ffb8'
        ]);
        User::create([
            'first_name' => 'Полина',
            'last_name' => 'Купитман',
            'gender' => 'f',
            'married' => 0,
            'birth_date' => '1988-09-10',
            'email' => 'Polina@kupitman.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bb9043620'
        ]);
        User::create([
            'first_name' => 'Андрей',
            'last_name' => 'Быков',
            'gender' => 'm',
            'married' => 1,
            'birth_date' => '1978-05-01',
            'email' => 'Andrey@bikov.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bba7b0838'
        ]);
        User::create([
            'first_name' => 'Иван',
            'last_name' => 'Купитман',
            'gender' => 'm',
            'married' => 0,
            'birth_date' => '1975-11-12',
            'email' => 'Ivan@kupitman.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bbb865518'
        ]);
        User::create([
            'first_name' => 'Анастасия',
            'last_name' => 'Кисегач',
            'gender' => 'f',
            'married' => 1,
            'birth_date' => '1979-06-12',
            'email' => 'Anastasia@kisegach.com',
            'password' => bcrypt('123456'),
            'storage' => 'unt-5624bbe303e80'
        ]);
    }
}
