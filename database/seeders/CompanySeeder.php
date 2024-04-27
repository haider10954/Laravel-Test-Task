<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of companies to create
        $numberOfCompanies = 10;

        // Create 10 companies
        for ($i = 1; $i <= $numberOfCompanies; $i++) {
            // Create company
            $company = Company::query()->create([
                'name' => 'Company ' . $i,
                'email' => 'company' . $i . '@example.com',
                'website' => 'http://www.company' . $i . '.com',
            ]);

            // Create employees corresponding to each company
            for ($j = 1; $j <= 5; $j++) { // Create 5 employees for each company
                Employee::query()->create([
                    'first_name' => 'Employee ' . $j,
                    'last_name' => 'Lastname ' . $j,
                    'email' => 'employee' . $j . '@company' . $i . '.com',
                    'phone' => '1234567890', // Adjust as per your requirement
                    'company_id' => $company->id,
                ]);
            }
        }
    }
}
