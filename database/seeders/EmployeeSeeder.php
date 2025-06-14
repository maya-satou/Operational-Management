<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // これを追加

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => '太郎', 'email' => 'taro@techic.co.jp', 'hire_date' => '2024-01-01'],
            ['name' => '次郎', 'email' => 'jiro@techic.co.jp', 'hire_date' => '2024-01-01'],
            ['name' => '三郎', 'email' => 'saburo@techic.co.jp', 'hire_date' => '2024-01-01'],
        ]);
    }
}
