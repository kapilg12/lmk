<?php

use App\Permission;
use Illuminate\Database\Seeder;

class OfficePermissions extends Seeder
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
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
        
    }
}
