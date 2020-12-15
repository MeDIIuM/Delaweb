<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->get();
        $name = ['Андрей', 'Илья', 'Артем', 'Игорь', 'Дмитрий', 'Анатолий', 'Никита'];
        $surname = ['Петров', 'Голобородов', 'Карпов', 'Бутков', 'Журавлев', 'Торочкин', 'Куницын'];
        $organization = ['Спектрум', 'Колизей', 'Альта', 'Бубо', 'Лама', 'Параллель'];

        for ($i = 0; $i < 30; $i++){
            DB::table('users')->insert([
                "name" => $name[array_rand($name, 1)],
                "surname" => $surname[array_rand($surname, 1)],
                "invite" => $name[array_rand($name, 1)],
                "phone" => random_int(89000000000, 89999999999),
                "organization" => $organization[array_rand($organization, 1)],
                "password" => Str::random(10),
            ]);
        }
    }
}
