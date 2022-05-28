<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$xGciw5Ym5RVBHVoC1kMpAOie4krBBhI1tsIe7m9mmiJHf2waqdIoa'
        ]);

        $user->assignRole('Writer','Admin');
        //
    }
}
