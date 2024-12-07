<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('skills')->insert([
            'industry' => 'Technology',
            'expertise' => 'IoT'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Technology',
            'expertise' => 'Cybersecurity'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Technology',
            'expertise' => 'Cloud Computing'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Technology',
            'expertise' => 'AI/ML'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Energy',
            'expertise' => 'Renewable'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Energy',
            'expertise' => 'Energy Transition'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Energy',
            'expertise' => 'Oil and Gas'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Energy',
            'expertise' => 'Power Distribution'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Financial Service',
            'expertise' => 'Sales Effectiveness'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Financial Service',
            'expertise' => 'Transformation'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Financial Service',
            'expertise' => 'Risk Mitigation'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Financial Service',
            'expertise' => 'Capital Management'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Financial Service',
            'expertise' => 'IoT'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Metal and Minings',
            'expertise' => 'Strategy and Operating Model'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Metal and Minings',
            'expertise' => 'Procurement and Supply Chain'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Metal and Minings',
            'expertise' => 'Energy Transition'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Healthcare',
            'expertise' => 'Biopharma Innovation'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Healthcare',
            'expertise' => 'Research'
        ]);

        DB::table('skills')->insert([
            'industry' => 'Healthcare',
            'expertise' => 'Development'
        ]);
    }
}
