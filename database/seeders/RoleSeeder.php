<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Админ';
        $admin->slug = 'admin';
        $admin->save();

        $manager = new Role();
        $manager->name = 'Менеджер';
        $manager->slug = 'manager';
        $manager->save();

        $client = new Role();
        $client->name = 'Клиент';
        $client->slug = 'client';
        $client->save();
    }
}
