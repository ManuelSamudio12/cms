<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')){
            Cat::factory(15)->create();
        }
    }
}
