<?php

namespace Database\Seeders;

use App\Services\CompanyService;
use App\Traits\SeederData;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    use SeederData;

    public function __construct(private CompanyService $service) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Netcommerce',
            ],
            [
                'name' => 'Netcommerce',
            ],
            [
                'name' => 'Netcommerce',
            ],
            // [more companies...]
        ];

        $this->createData($companies, $this->service->getClassModel());
    }
}
