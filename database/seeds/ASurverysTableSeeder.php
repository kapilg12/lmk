<?php

use Illuminate\Database\Seeder;

class ASurverysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('a_surveys')->truncate();
        DB::table('a_surveys')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'torrent_id' => 2,
                'office_id' => 1,
                'allow_area' => "10002",
                'establishment_name' => "Test Demo",
                'postel_address' => "44a Khatipura Jaipur",
                'pin_code' => '302001',
                'nature_of_establishment' => 'proprietorship',
                'contact_person_name' => "Demo",
                'designation' => "Manager",
                'contact_number' => '2525252525',
                'email' => 'demo@demo.com',
                'website' => 'www.google.com',
                'is_active' => 1,
                'is_approved' => 1,
                'is_completed' => 1,
                'is_certified' => 1,
            ], [
                'id' => 2,
                'user_id' => 3,
                'torrent_id' => 4,
                'office_id' => 2,
                'allow_area' => "10002",
                'establishment_name' => "Test Demo",
                'postel_address' => "44b Khatipura Jaipur",
                'pin_code' => '302001',
                'nature_of_establishment' => 'proprietorship',
                'contact_person_name' => "Demo",
                'designation' => "Manager",
                'contact_number' => '2525252525',
                'email' => 'demo@demo.com',
                'website' => 'www.google.com',
                'is_active' => 1,
                'is_approved' => 1,
                'is_completed' => 1,
                'is_certified' => 1,
            ], [
                'id' => 3,
                'user_id' => 5,
                'torrent_id' => 6,
                'office_id' => 3,
                'allow_area' => "10002",
                'establishment_name' => "Test Demo",
                'postel_address' => "4cb Khatipura Jaipur",
                'pin_code' => '302001',
                'nature_of_establishment' => 'proprietorship',
                'contact_person_name' => "Demo",
                'designation' => "Manager",
                'contact_number' => '5556565656',
                'email' => 'a@a.com',
                'website' => 'www.google.com',
                'is_active' => 1,
                'is_approved' => 1,
                'is_completed' => 1,
                'is_certified' => 1,
            ],
        ]);
        DB::table('b_surveys')->truncate();
        DB::table('b_surveys')->insert([
            [
                'id' => 1,
                'a_surveys_id' => 1,
                'total_land_area' => '2000',
                'roof_top_area' => '4500',
                'road_paved_area' => '900',
                'green_belt_area' => '1000',
                'open_land' => '300',
                'average_annual_rainfall' => '4 Month',
                'number_of_rainy_day' => '80',
                'nature_of_aquifer' => 'alluvial_area',
                'nature_of_terrain' => 'hocky',
                'nature_of_soil' => 'alluvial',
                'recharge_well_depth' => '100',
                'recharge_well_diameter' => '100',
                'recharge_pit_depth' => '200',
                'recharge_pit_diameter' => '200',
                'recharge_trenches_l' => '1500',
                'recharge_trenches_w' => '2000',
                'recharge_trenches_d' => '3000',
                'water_bodies_ponds_depth' => '2000',
                'water_bodies_ponds_diameter' => '200',
                'source_of_availability_of_surface_water' => 'source of availability of surface water',
                'water_supply_from_RIICO' => 'water supply from RIICO',
            ], [
                'id' => 2,
                'a_surveys_id' => 2,
                'total_land_area' => '2000',
                'roof_top_area' => '4500',
                'road_paved_area' => '900',
                'green_belt_area' => '1000',
                'open_land' => '300',
                'average_annual_rainfall' => '4 Month',
                'number_of_rainy_day' => '80',
                'nature_of_aquifer' => 'alluvial_area',
                'nature_of_terrain' => 'hilly',
                'nature_of_soil' => 'sandy',
                'recharge_well_depth' => '100',
                'recharge_well_diameter' => '100',
                'recharge_pit_depth' => '200',
                'recharge_pit_diameter' => '200',
                'recharge_trenches_l' => '1500',
                'recharge_trenches_w' => '2000',
                'recharge_trenches_d' => '3000',
                'water_bodies_ponds_depth' => '2000',
                'water_bodies_ponds_diameter' => '200',
                'source_of_availability_of_surface_water' => 'source of availability of surface water',
                'water_supply_from_RIICO' => 'water supply from RIICO',
            ], [
                'id' => 3,
                'a_surveys_id' => 3,
                'total_land_area' => '6000',
                'roof_top_area' => '2000',
                'road_paved_area' => '3000',
                'green_belt_area' => '1000',
                'open_land' => '800',
                'average_annual_rainfall' => '3 Month',
                'number_of_rainy_day' => '50',
                'nature_of_aquifer' => 'impermeable-area',
                'nature_of_terrain' => 'undulating, uniform, flat',
                'nature_of_soil' => 'sandy',
                'recharge_well_depth' => '100',
                'recharge_well_diameter' => '100',
                'recharge_pit_depth' => '200',
                'recharge_pit_diameter' => '200',
                'recharge_trenches_l' => '1500',
                'recharge_trenches_w' => '2000',
                'recharge_trenches_d' => '3000',
                'water_bodies_ponds_depth' => '2000',
                'water_bodies_ponds_diameter' => '200',
                'source_of_availability_of_surface_water' => 'source of availability of surface water',
                'water_supply_from_RIICO' => 'water supply from RIICO',
            ],
        ]);

        DB::table('b_sg_waters')->truncate();
        DB::table('b_sg_waters')->insert([
            [
                'id' => 1,
                'b_surveys_id' => 1,
                'tubewell_borewell' => "tubewell",
                'depth_of_s_pump' => "5000",
                'current_water_abstraction' => "current water abstraction",
            ], [
                'id' => 2,
                'b_surveys_id' => 2,
                'tubewell_borewell' => "borewell",
                'depth_of_s_pump' => "5000",
                'current_water_abstraction' => "current water abstraction borewell",
            ], [
                'id' => 3,
                'b_surveys_id' => 3,
                'tubewell_borewell' => "borewell",
                'depth_of_s_pump' => "5000",
                'current_water_abstraction' => "current water abstraction borewell",
            ],
        ]);
        DB::table('b_attachments')->truncate();
        DB::table('b_attachments')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'b_surveys_id' => 1,
                'area_location' => "demo.jpg",
                'sources_sw_gw' => "demo1.jpg",
                'existing_rwh_structure' => "demo2.jpg",
                'site_layout_plan' => "demo3.jpg",
            ], [
                'id' => 2,
                'user_id' => 1,
                'b_surveys_id' => 2,
                'area_location' => "test.jpg",
                'sources_sw_gw' => "test1.jpg",
                'existing_rwh_structure' => "test2.jpg",
                'site_layout_plan' => "test3.jpg",
            ], [
                'id' => 3,
                'user_id' => 2,
                'b_surveys_id' => 3,
                'area_location' => "demo5.jpg",
                'sources_sw_gw' => "demo6.jpg",
                'existing_rwh_structure' => "demo7.jpg",
                'site_layout_plan' => "demo8.jpg",
            ],
        ]);

        DB::table('gpscoordinates')->truncate();
        DB::table('gpscoordinates')->insert([
            [
                'id' => 1,
                'b_surveys_id' => 1,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "A",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 2,
                'b_surveys_id' => 1,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "B",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 3,
                'b_surveys_id' => 1,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "C",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 4,
                'b_surveys_id' => 1,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "D",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 5,
                'b_surveys_id' => 5,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "A",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 6,
                'b_surveys_id' => 5,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "B",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 7,
                'b_surveys_id' => 2,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "C",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 8,
                'b_surveys_id' => 2,
                'GPSCoordinate_area' => "bulding",
                'GPSCoordinate_type' => "bulding",
                'GPSCoordinate_point' => "D",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ], [
                'id' => 9,
                'b_surveys_id' => 3,
                'GPSCoordinate_area' => "tubewell",
                'GPSCoordinate_type' => "tubewell",
                'GPSCoordinate_point' => "A",
                'GPSCoordinate_latitude' => "26.8497° N",
                'GPSCoordinate_longitude' => "75.7692° E",
            ],
        ]);

        DB::table('c_one_surveys')->truncate();
        DB::table('c_one_surveys')->insert([
            [
                'id' => 1,
                'a_surveys_id' => 1,
                'details_of_water_requirement' => "industrial",
                'requirement_CGWA_permission' => "Yes",
                'existing_requirement' => "Yes",
                'no_of_operational_day' => "100",
                'annual_requirement' => "Yes",
            ], [
                'id' => 2,
                'a_surveys_id' => 1,
                'details_of_water_requirement' => "residential",
                'requirement_CGWA_permission' => "Yes",
                'existing_requirement' => "Yes",
                'no_of_operational_day' => "100",
                'annual_requirement' => "Yes",
            ], [
                'id' => 3,
                'a_surveys_id' => 1,
                'details_of_water_requirement' => "domestic",
                'requirement_CGWA_permission' => "Yes",
                'existing_requirement' => "Yes",
                'no_of_operational_day' => "100",
                'annual_requirement' => "Yes",
            ], [
                'id' => 4,
                'a_surveys_id' => 1,
                'details_of_water_requirement' => "greenbelt_development",
                'requirement_CGWA_permission' => "Yes",
                'existing_requirement' => "Yes",
                'no_of_operational_day' => "100",
                'annual_requirement' => "Yes",
            ], [
                'id' => 5,
                'a_surveys_id' => 1,
                'details_of_water_requirement' => "other_uses_specify",
                'requirement_CGWA_permission' => "Yes",
                'existing_requirement' => "Yes",
                'no_of_operational_day' => "100",
                'annual_requirement' => "Yes",
            ],
        ]);
        DB::table('c_two_surveys')->truncate();
        DB::table('c_two_surveys')->insert([
            [
                'id' => 1,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Total waste water generated",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 2,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Quantity of treated water generated",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 3,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Reuse in Industrial activity",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 4,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Reuse in green belt development",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 5,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Domestic",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 6,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => " Other uses",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 7,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Total Treated water utilised",
                'cum_day' => "180",
                'cum_year' => "2106",
            ], [
                'id' => 8,
                'a_surveys_id' => 1,
                'breakup_of_recycled_water_usage' => "Water Testing Report of Treated Water",
                'cum_day' => "180",
                'cum_year' => "2106",
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
