<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/27/19
 * Time: 12:35 AM
 */
use Illuminate\Database\Seeder;
class RoomOffersSeeder extends Seeder
{
    public function run()
    {

        $offers = \App\Offer::all();
        \App\Room::all()->each(function ($room) use ($offers) {
            $room->offers()->attach(
                $offers->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
