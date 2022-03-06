<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;


class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        $user = User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // 'role' => 'admin',
            'email_verified_at' => NULL,
            'password' => Hash::make('111111'),
            'provaider_user_id' => '777777777777777777',
            'provaider' => 'myuser',
            'avatar' => 'https://practica.com/img/default_profile_avatar.jpg',
            'remember_token' => NULL,
            'created_at' => '2020-07-22 16:13:58',
            'updated_at' => '2020-07-22 16:13:58',
        ]);
            \DB::table('roles')->delete();

            \DB::table('roles')->insert(array (
                0 =>
                array (
                    'name' => 'client',
                ),
                1 =>
                array (
                    'name' => 'manager',
                ),
                2 =>
                array (
                    'name' => 'admin',
                ),
            ));
            \DB::table('user_roles')->delete();
               
            $user->makeEmployee("admin",'true');
            $user->makeEmployee("manager",'true');
            $user->makeEmployee("client",'true');
        
    }
}
