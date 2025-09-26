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
            // [more users...]
        ];

        $this->createData($users, User::class, function (Builder $query, $value) {
            return $query->where('email', $value['email']);
        });
    }
}
