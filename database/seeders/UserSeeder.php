<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $client = Role::where('slug', 'client')->first();

        $allSuccess = Permission::where('slug','all-success')->first();
        $managerSuccess = Permission::where('slug','manager-success')->first();
        $clientSuccess = Permission::where('slug','client-success')->first();

        $user1 = new User();
        $user1->name = 'Жанузак Админ';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('123456zz');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($allSuccess);

        $user2 = new User();
        $user2->name = 'Жанузак Менеджер';
        $user2->email = 'manager@manager.com';
        $user2->password = bcrypt('123456zz');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($managerSuccess);

        $user3 = new User();
        $user3->name = 'Жанузак Клиент';
        $user3->email = 'client@client.com';
        $user3->password = bcrypt('123456zz');
        $user3->save();
        $user3->roles()->attach($client);
        $user3->permissions()->attach($clientSuccess);
    }
}
