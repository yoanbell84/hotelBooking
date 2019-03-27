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

            ['id' => 1, 'name' => 'Tub/Shower','description'=>'Tub or Shower Available'],
            ['id' => 2, 'name' => 'Wifi','description'=>'Free Wifi'],
            ['id' => 3, 'name' => 'Spa','description'=>'Spa for all customers'],
            ['id' => 4, 'name' => 'Pool','description'=>'Pool'],
            ['id' => 5, 'name' => 'Parking Lot','description'=>'Parking Lot'],
            ['id' => 6, 'name' => 'Sat TV','description'=>'Satellite TV']
        ];

        foreach ($items as $item) {
            \App\Amenity::create($item);
        }
    }
}
