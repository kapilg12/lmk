<?php

use Illuminate\Database\Seeder;
use App\Permission;

class CountryStatePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'country-list',
                'display_name' => 'Display country Listing',
                'description' => 'See only Listing Of country',
            ],
            [
                'name' => 'country-create',
                'display_name' => 'Create country',
                'description' => 'Create New country',
            ],
            [
                'name' => 'country-edit',
                'display_name' => 'Edit country',
                'description' => 'Edit country',
            ],
            [
                'name' => 'country-delete',
                'display_name' => 'Delete country',
                'description' => 'Delete country',
            ],     
            [
                'name' => 'state-list',
                'display_name' => 'Display state Listing',
                'description' => 'See only Listing Of state',
            ],
            [
                'name' => 'state-create',
                'display_name' => 'Create state',
                'description' => 'Create New state',
            ],
            [
                'name' => 'state-edit',
                'display_name' => 'Edit state',
                'description' => 'Edit state',
            ],
            [
                'name' => 'state-delete',
                'display_name' => 'Delete state',
                'description' => 'Delete state',
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Display user Listing',
                'description' => 'See only Listing Of user',
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create user',
                'description' => 'Create New user',
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit user',
                'description' => 'Edit user',
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete user',
                'description' => 'Delete user',
            ],                               
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
