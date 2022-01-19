<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'breeds';
        $this->filename = base_path().'/database/seeders/csvs/breeds.csv';
        $this->should_trim = true;
        $this->timestamps = true;
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}
