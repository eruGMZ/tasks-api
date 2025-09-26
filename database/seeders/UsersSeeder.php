<?php

namespace Database\Seeders;

use App\Models\User;
use App\Traits\SeederData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    use SeederData;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Akira',
                'email' => 'akira@example.com',
                'password' => bcrypt(rand(1000, 9999)),
                'company_id' => 1
            ],
            [
                'name' => 'Sakura',
                'email' => 'sakura@example.com',
                'password' => bcrypt(rand(1000, 9999)),
                'company_id' => 1
            ],
            [
                'name' => 'Takeshi',
                'email' => 'takeshi@example.com',
                'password' => bcrypt(rand(1000, 9999)),
                'company_id' => 1
            ]
        ];

        $this->createData($users, User::class, function (Builder $query, $value) {
            return $query->where('email', $value['email']);
        });
    }
}
