<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create_Admin_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::create([
            "name"=> "Bajaman",
            "email"=> "bajamanabdo@gmail.com",
            "password"=> bcrypt("123456789"),
            "roles_name"=> ["Super_Admin"],
        ]);
        // $user->assignRole("admin");
        $role=Role::create(['name'=>'Super_Admin']);
        $permission=Permission::pluck('id','id')->all();
        // $role->permissions()->attach($permission);
        $role->syncPermissions($permission);


        $user->assignRole($role);

    }
}
