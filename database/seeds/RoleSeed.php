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
        	'id'=>1,
        	'name'=>'superadmin',
        	'display_name'=>'Master Administrator',
        	'description'=>'User with each and every permission'
        ]);
        $permissions = DB::table('permissions')->select('id')->get();
        foreach ($permissions as $key => $value) {
        	DB::table('permission_role')->insert([
        		'permission_id'=>$value->id,
        		'role_id'=>1
        	]);	
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');        
    }
}
