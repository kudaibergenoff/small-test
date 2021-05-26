<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $roles = Role::get();

        return view('web.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('web.roles.add');
    }

    public function add(RoleRequest $request)
    {
        $role = RoleService::createNewRole($request);
        
        if($role)
        {
            return redirect()->route('roles')->with(['success' => 'Успешно добавлены!']);
        }
        return back()->with(['error' => 'Ошибка!']);
    }
}
