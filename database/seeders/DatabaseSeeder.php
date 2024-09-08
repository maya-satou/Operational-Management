<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('employees')->insert([
        //     ['name' => '太郎', 'email' => 'taro@techic.co.jp', 'hire_date' => '2024-01-01' ],
        //     ['name' => '次郎', 'email' => 'jiro@techic.co.jp', 'hire_date' => '2024-01-01'],
        //     ['name' => '三郎', 'email' => 'saburo@techic.co.jp', 'hire_date' => '2024-01-01'],

        // ]);
        DB::table('skill_ranks')->insert([
            ['name' => '上級SE'],
            ['name' => '中級SE'],
            ['name' => '初級SE'],
           
            
        ]);
        DB::table('departments')->insert([
            ['name' => '開発部'],
            ['name' => '営業部'],
            ['name' => '総務部'],
           
            
        ]);

    }
}
