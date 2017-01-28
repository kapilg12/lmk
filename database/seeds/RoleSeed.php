<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	DB::table('roles')->truncate();
    	DB::table('permission_role')->truncate();
        DB::table('roles')->insert([
            [            
            'name'=>'devadmin',
            'display_name'=>'Developer',
            'description'=>'User with each and every permission'
            ],
            [            
            'name'=>'superadmin',
            'display_name'=>'Master Administrator',
            'description'=>'User with each and every permission'
            ],
            [            
            'name'=>'torrentadmin',
            'display_name'=>'Torrent Administrator',
            'description'=>'Torrent Administrator'
            ] ,
            [            
            'name'=>'auditor',
            'display_name'=>'Auditor',
            'description'=>'Auditor'
            ]            
        ]);

        $roleID = DB::table('roles')->select('id','name')->get();
        $permissions = DB::table('permissions')->select('id','name')->get();
        $excludePermissionArray = array('role-list','role-create','role-edit','role-delete','role-show');
        $excludeRoleArray = array("superadmin","torrentadmin","auditor");
        foreach ($roleID as $key => $RoleValue) {
            foreach ($permissions as $key => $value) {
                if(in_array($RoleValue->name, $excludeRoleArray) && in_array($value->name,$excludePermissionArray))
                    continue;
                DB::table('permission_role')->insert([
                    'permission_id'=>$value->id,
                    'role_id'=>$RoleValue->id
                ]); 
            }
        }
        

        //roles/permissions/
        //role-list|role-create|role-edit|role-delete|role-show
        DB::statement('SET FOREIGN_KEY_CHECKS=1');        
    }
}
