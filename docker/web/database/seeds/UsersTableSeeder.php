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
            'password'       => '$2y$10$64yOpWpkXdfjIHXjvb5qSu0VwADXdnyE.s9gYLyiI1yV1lkhrQHn2',
            'remember_token' => null,
            'created_at'     => '2020-02-11 17:07:43',
            'updated_at'     => '2020-02-11 17:07:43',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
