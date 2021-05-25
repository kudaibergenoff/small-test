<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allSuccess = new Permission();
        $allSuccess->name = 'Полный доступ';
        $allSuccess->slug = 'all-success';
        $allSuccess->save();

        $managerSuccess = new Permission();
        $managerSuccess->name = 'Менеджер доступ';
        $managerSuccess->slug = 'manager-success';
        $managerSuccess->save();

        $clientSuccess = new Permission();
        $clientSuccess->name = 'Клиент доступ';
        $clientSuccess->slug = 'client-success';
        $clientSuccess->save();
    }
}
