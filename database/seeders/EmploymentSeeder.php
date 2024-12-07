<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employments')->insert([
            'position' => 'Research Analyst',
            'base_salary' => 12000 //stated in ribu rupiah
        ]);

        DB::table('employments')->insert([
            'position' => 'Business Analyst',
            'base_salary' => 18000 //stated in ribu rupiah
        ]);

        DB::table('employments')->insert([
            'position' => 'Senior Business Analyst',
            'base_salary' => 25000 //stated in ribu rupiah
        ]);

        DB::table('employments')->insert([
            'position' => 'Associate',
            'base_salary' => 40000 //stated in ribu rupiah
        ]);
    }
}
