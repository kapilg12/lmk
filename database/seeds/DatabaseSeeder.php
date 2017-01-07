<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Model::unguard();
    	$this->call(PermissionTableSeeder::class);
        
        $this->call(RoleSeed::class);
        
        $this->call(UserSeeder::class);

        $this->call(ASurverysTableSeeder::class);        
        
        //Model::guard();
    }
}
