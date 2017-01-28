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
            [
            'id' => 1,
            'name' => 'Supreme Administrator',
            'email' => 'kapilvermasgnr@gmail.com',
            'password' => '$2y$10$h/L7XsQEIQCfq5PrUmtJtOIzgoCyxSdb/2zed0VlbEYPZh3Lkn7Cu',
            'remember_token' => 'helloSupreme',
        ],
        [
            'id' => 2,
            'name' => 'Super Administrator',
            'email' => 'info@bhujalsanrakshan.com',
            'password' => '$2y$10$zJZ8uhgC6Zqa9EhlnDtc0.h2gjQpM4rKmVdy60CrSQDlNkZ1kizKq',
            'remember_token' => 'helloAdmin',
        ],
                [
            'id' => 3,
            'name' => 'Torrent Administrator',
            'email' => 'torrent@bhujalsanrakshan.com',
            'password' => '$2y$10$zJZ8uhgC6Zqa9EhlnDtc0.h2gjQpM4rKmVdy60CrSQDlNkZ1kizKq',
            'remember_token' => 'helloAdmin',
        ],
        [
            'id' => 4,
            'name' => 'Auditor',
            'email' => 'auditor@bhujalsanrakshan.com',
            'password' => '$2y$10$zJZ8uhgC6Zqa9EhlnDtc0.h2gjQpM4rKmVdy60CrSQDlNkZ1kizKq',
            'remember_token' => 'helloAdmin',
        ]
        ]);
        DB::table('role_user')->insert(
            [
            [
            'user_id' => 1,
            'role_id' => 1,
        ],
        [
            'user_id' => 2,
            'role_id' => 2,
        ],
        [
            'user_id' => 3,
            'role_id' => 3
        ],
        [
            'user_id' => 4,
            'role_id' => 4
        ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
