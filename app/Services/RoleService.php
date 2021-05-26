<?php
namespace App\Services;

use App\Models\{Role, Permission};
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Str;

class RoleService
{
    public static function createNewRole(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-')
        ]);

        if(!$role)
        {
            return false;
        }
        return $role;
    }
}