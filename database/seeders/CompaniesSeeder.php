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
        $tasks = [
            [
                'name' => 'Netcommerce',
            ],
            [
                'name' => 'Netcommerce 2',
            ],
            [
                'name' => 'Netcommerce 3',
            ]
        ];

        $this->createData($tasks, $this->service->getClassModel(), function ($query, $value) {
            return $query->where('name', $value['name']);
        });
    }
}
