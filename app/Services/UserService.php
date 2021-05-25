<?php
namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function createNewUser(UserRequest $request)
    {
        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->password)
        ]);

        if(!$user)
        {
            return false;
        }

        return $user;
    }
}