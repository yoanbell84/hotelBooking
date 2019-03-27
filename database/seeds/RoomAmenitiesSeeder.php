<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/27/19
 * Time: 12:34 AM
 */

use Illuminate\Database\Seeder;
class RoomAmenitiesSeeder extends Seeder
{
    public function run()
    {

        $amenities = \App\Amenity::all();
        \App\Room::all()->each(function ($room) use ($amenities) {

            $room->amenities()->attach(
                $amenities->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
