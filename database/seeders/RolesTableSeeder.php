<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    //     $user = User::create([
    //         'name' => 'admin',
    //         'email' => 'admin@gmail.com',
    //         'password' => bcrypt('12345678')
    //     ]);

    //     $role = Role::create(['name' => 'Admin']);

    //     $permissions = Permission::pluck('id','id')->all();

    //     $role->syncPermissions($permissions);

    //     $user->assignRole([$role->id]);

      DB::table('users')->insert([

        //admin
        [
        'name' => 'Admin',
        'username' => 'admin',
        'email'  =>'admin@gamil.com',
         'password' => Hash::make('12345678'),
          'status'=> 'active',

        ],
        //user
        [
            'name' => 'User',
            'username' => 'user',
            'email'  =>'user@gamil.com',
             'password' => Hash::make('12345678'),
              'status'=> 'active',

            ],

      ]);


    }
}
