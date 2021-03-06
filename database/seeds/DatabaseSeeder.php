<?php

use Illuminate\Database\Seeder;
use App\Motel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $motel = new Motel([
            'title' => 'nhà cấp 3', 
            'description' => 'nhà đẹp', 'price' => 2000000, 'area' => 30, 'count_view' => 0, 'like' => 0, 'rating' => 0, 'address' => 'Ha noi', 'phone' => 123, 'images' => '{"0":"phongtro-6O7N4-32783828_1207853946018675_1556571610645790720_n.jpg"}', 'user_id' => 12, 'district_id' => 2, 
        ]);
        // $motel = new Motel([
        //     'title' => 'nhà cấp 4'
        // ]);
        $motel->save();

    }
}
