<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Container\User\Database\Model\User;
use App\Container\Device\Database\Model\Device;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (User::factory()->count(3)->create() as $user) {
            Device::factory()->withUser($user)->count(3)->create();
        }
    }
}
