<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('web.auth.login');
    }

    public function login(LoginRequest $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials))
        {
            return redirect()->intended('tickets');
        }
        return back()->with(['error' => 'Ошибка!']);
    }

    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Вы успешно вышли!';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return redirect()->route('login')->with($response);
    }
}
