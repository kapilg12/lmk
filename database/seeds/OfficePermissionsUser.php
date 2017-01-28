<?php

use Illuminate\Database\Seeder;

class OfficePermissionsUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //{"country":["1"],"state":["1"],"allowedOffices":["1",10,12,13,14,16,null]}
    public function run()
    {
        $offices = DB::table('offices')->pluck("id");
        $optionsJSON = '{"country":["1"],"state":["1"],"allowedOffices":'.json_encode($offices).'}';
        DB::table('users')
            ->where('id', 1)
            ->update(['options' => $optionsJSON ]);
            DB::table('users')
            ->where('id', 2)
            ->update(['options' => $optionsJSON ]);
    }
}
