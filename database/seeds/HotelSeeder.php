<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
/**
 * Description of HotelSeeder
 *
 * @author yoan
 *
 */
class HotelSeeder extends Seeder {
    //put your code here
     public function run(Faker $faker){


        $items = [
            ['id' => 1, 'name' => 'Sunset Key West Resort','description'=>'','rating'=>rand(1,5),'address'=> $faker->address,'image' => 'hotel-'.rand(1,9).'.jpeg'],
            ['id' => 2, 'name' => 'Miami Beach Resort Club','description'=>'','rating'=>rand(1,5),'address'=>$faker->address,'image' => 'hotel-'.rand(1,9).'.jpeg'],
            ['id' => 3, 'name' => 'Best Bay Resort','description'=>'','rating'=>rand(1,5),'address'=>$faker->address,'image' => 'hotel-'.rand(1,9).'.jpeg'],
            ['id' => 4, 'name' => 'Daytona Club Resort','description'=>'','rating'=>rand(1,5),'address'=>$faker->address,'image' => 'hotel-'.rand(1,9).'.jpeg'],
            ['id' => 5, 'name' => 'Miami Private Bay Resort','description'=>'','rating'=>rand(1,5),'address'=>$faker->address,'image' => 'hotel-'.rand(1,9).'.jpeg']
        ];

        foreach ($items as $item) {
            \App\Hotel::create($item);
        }
    }
    
}
