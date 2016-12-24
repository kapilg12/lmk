<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('role_user')->truncate();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Super Administrator',
            'email' => 'kapilvermasgnr@gmail.com',
            'password' => '$2y$10$zJZ8uhgC6Zqa9EhlnDtc0.h2gjQpM4rKmVdy60CrSQDlNkZ1kizKq',
            'remember_token' => 'helloAdmin',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
