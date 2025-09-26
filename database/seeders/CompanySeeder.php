<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Empresa 1',
        ]);

        Company::create([
            'name' => 'Empresa 2',
        ]);

        Company::create([
            'name' => 'Empresa 3',
        ]);

    }
}
