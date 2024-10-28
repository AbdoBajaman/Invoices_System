<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller  implements HasMiddleware
{
    function __construct()
    {

        // $this->middleware("", [""=> ["index",""]]);
        // $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create', 'store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);
    }
    public static function middleware(): array
    {
        return [

            new Middleware('permission:صلاحيات المستخدمين', only: ['index']),
            new Middleware('permission:عرض صلاحية', only: ['show']),
            new Middleware('permission:اضافة صلاحية', only: ['create', 'store']),
            new Middleware('permission:تعديل صلاحية', only: ['edit', 'update']),
            new Middleware('permission:حذف صلاحية', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(10);
        return view('roles.roles', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permission = Permission::get();
        return view('roles.create_role', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $permissions = $request->permission;
        $validate = $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',

        ]);
        // dd($request->all());

        $role = Role::create([
            'name' => $request->name,
        ]);
        if (!empty($permissions)) {
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            // dd($permissionNames);
            // todo remove all current permissions and put the new ones to specific role (role has permissions table).
            $role->syncPermissions($permissionNames);
        } else {
            $role->syncPermissions([]);
        }


        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        // dd($rolePermissions);
        return view('roles.role_details', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        // dd($rolePermissions);

        return view('roles.edit_roles', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->permission;

        // dd($permissions);
        if (!empty($permissions)) {
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();

            
            // todo remove all current permissions and put the new ones to specific role.
            $role->syncPermissions($permissionNames);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->route('roles.index')
            ->with('success', 'تم تحديث الصلاحيه');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
