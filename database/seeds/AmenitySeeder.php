<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/22/19
 * Time: 2:18 PM
 */

use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'bath Tub','description'=>'Bath Tub Available'],
            ['id' => 2, 'name' => 'wifi','description'=>'Free Wifi'],
            ['id' => 3, 'name' => 'spa','description'=>'Spa for all customers']
        ];

        foreach ($items as $item) {
            \App\Amenity::create($item);
        }
    }
}
