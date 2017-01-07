<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role',
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role',
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role',
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role',
            ],
            [
                'name' => 'role-show',
                'display_name' => 'Show Role',
                'description' => 'Show Role',
            ],  
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
                'name' => 'country-show',
                'display_name' => 'Show country',
                'description' => 'Show country',
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
                'name' => 'state-show',
                'display_name' => 'Show state',
                'description' => 'Show state',
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
            [
                'name' => 'user-show',
                'display_name' => 'Show user',
                'description' => 'Show user',
            ], 
            [
                'name' => 'office-list',
                'display_name' => 'Display office Listing',
                'description' => 'See only Listing Of office',
            ],
            [
                'name' => 'office-create',
                'display_name' => 'Create office',
                'description' => 'Create New office',
            ],
            [
                'name' => 'office-edit',
                'display_name' => 'Edit office',
                'description' => 'Edit office',
            ],
            [
                'name' => 'office-delete',
                'display_name' => 'Delete office',
                'description' => 'Delete office',
            ], 
            [
                'name' => 'office-show',
                'display_name' => 'Show office',
                'description' => 'Show office',
            ],  
            [
                'name' => 'audit-list',
                'display_name' => 'Display audit Listing',
                'description' => 'See only Listing Of Audtis',
            ],
            [
                'name' => 'audit-create',
                'display_name' => 'Create audit',
                'description' => 'Create New audit',
            ],
            
            [
                'name' => 'audit-show',
                'display_name' => 'Show audit',
                'description' => 'Show audit',
            ],         
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
