<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $organization = ['Спектрум', 'Колизей', 'Альта', 'Бубо', 'Лама', 'Параллель'];
        for ($i = 0; $i < 30; $i++) {
            DB::table('organization')->insert([
                "name" => $organization[array_rand($organization, 1)],
            ]);
        }
    }
}
