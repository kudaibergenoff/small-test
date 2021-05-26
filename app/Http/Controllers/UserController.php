<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\{User, Role};
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::with('roles')->get();
        return view('web.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('web.users.add');
    }

    public function add(UserRequest $request)
    {
        $user = UserService::createNewUser($request);
        $user->roles()->attach($request->role_id);
        if($user)
        {
            return redirect()->route('users');
        }
        return back()->with(['error' => 'Ошибка!']);
    }
}
