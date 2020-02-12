<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Netshow.me',
            'email'          => 'admin@email.com',
            'password'       => '$2y$12$kvZwGunHm536wm9lCXZDvOSKE9uKndiRSw.TOOt7TVITfrdo5hImW',
            'remember_token' => null,
            'created_at'     => '2020-02-11 17:07:43',
            'updated_at'     => '2020-02-11 17:07:43',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
