<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Customer::class, 10)->create();

         factory(App\Booking::class, 5)->create();
         $this->call([
             RoleSeeder::class,
             UserSeeder::class,
             HotelSeeder::class,
             RoomSeeder::class,
             RoomStatusSeeder::class,
             AmenitySeeder::class,
             OfferSeeder::class,
             RoomAmenitiesSeeder::class,
             RoomOffersSeeder::class,
             ]);
    }
}
