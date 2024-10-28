<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Models\User;
// use App\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Routing\Controllers\Middleware;
// use Hash;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware ('permission:قائمة المستخدمين', only:['index']),
            new Middleware ('permission:تعديل مستخدم', only:['edit','update']),

            // todo needed to put in permission and route function new Middleware('permission:عرض تفاصيل المستخدم', only:['show']),

            new Middleware('permission:اضافة مستخدم', only:['create', 'store']),
            new Middleware('permission:حذف مستخدم',only : ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.users', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.Add_user', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|same:confirm-password',
        //     'roles_name' => 'required'
        // ]);
// dd($request->all());
        $input = $request->all();
        $validate=$request->validate([
            'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles_name' => 'required'

        ]);


        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        // ! this the basic that confirm the role to user model (model has role table)
        $user->assignRole($input['roles_name']);
        return redirect()->route('users.index')
            ->with('success', 'تم اضافة المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        // dd  ($id);
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();

        // dd($user);
        $userRole = $user->roles->pluck('name', 'name')->all();
        // dd($userRole);
        // return view('users.edit_user');
        return view('users.edit_user', compact('user', 'roles', 'userRole'));
    }
    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'same:confirm-password',
        //     'roles' => 'required'
        // ]);
        $validate=$request->validate([

            'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);

        $input = $request->all();

        // dd($input);

        //  else {
        //     // dd('1');
        //     // $input = array_except($input, array('password'));
        // }
        $user = User::find($id);
        // dd($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        if ($request->password == "") {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'roles_name' => $input['roles'],
                'is_active' => $input['is_active'],


            ]);

        } else {
            $input['password'] = Hash::make($input['password']);

            $user->update($input);
        }
        // $user->update([
        //     'name'=> $input['name'],
        //     'email'=> $input['email'],
        //     'password'=> $input['password'],
        //     'roles_name'=> $input['roles'],
        // ]);

        $user->assignRole($input['roles']);
        return redirect()->route('users.index')
            ->with('success', 'تم تحديث معلومات المستخدم بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
