<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Weight_targetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $target = [
            'users_id' => 1,
            'target_weight' => '50'
        ];
        DB::table('weight_targets')->insert($target);
    }
}
