<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clients')->insert([
            'needs' => 'Digital Transformation',
            'duration' => '19', //stated in weeks
            'project_rate' => 1200000 //stated in ribu rupiah
        ]);

        DB::table('clients')->insert([
            'needs' => 'Mergers and Acquisitions',
            'duration' => '24', //stated in weeks
            'project_rate' => 1500000 //stated in ribu rupiah
        ]);

        DB::table('clients')->insert([
            'needs' => 'Operations and Performance',
            'duration' => 14, //stated in weeks
            'project_rate' => 700000 //stated in ribu rupiah
        ]);

        DB::table('clients')->insert([
            'needs' => 'Sustainability',
            'duration' => 17, //stated in weeks
            'project_rate' => 900000 //stated in ribu rupiah
        ]);
    }
}
