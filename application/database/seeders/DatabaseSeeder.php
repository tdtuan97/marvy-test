<?php

namespace Database\Seeders;

use App\Models\laundry_shop\MstUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        MstUser::factory(1)->create();
    }
}
