<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('web.auth.register');
    }

    public function register(UserRequest $request)
    {
        $user = UserService::createNewUser($request);

        $user->roles()->attach(Role::where('slug', 'client')->first());

        $request->session()->regenerate();

        Auth::login($user);

        if(!$user)
        {
            $success = false;
            $message = 'Упс! Ошибка при регистрации!';
            return back()->with(['success' => $success, 'message' => $message]);
        } else {
            $success = true;
            $message = 'Вы успешно зарегистрировались!';
            return redirect()->intended('tickets')->with(['success' => $success, 'message' => $message]);
            //return redirect()->intended('tickets');
        }
    }
}
