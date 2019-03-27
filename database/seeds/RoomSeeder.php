<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;
/**
 * Description of RoomSeeder
 *
 * @author yoan
 */
class RoomSeeder extends Seeder{
    //put your code here
       public function run(){
        $items = [
            
            ['id' => 1, 'room_number' => '01','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6) , 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 2, 'room_number' => '02','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite CourtYard','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 3, 'room_number' => '03','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 4, 'room_number' => '04','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite CourtYard','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 5, 'room_number' => '01','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 6, 'room_number' => '02','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Bedroom Suite Ocean View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 7, 'room_number' => '03','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 8, 'room_number' => '04','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite CourtYard','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 9, 'room_number' => '01','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 10, 'room_number' => '02','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite CourtYard','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 11, 'room_number' => '03','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 12, 'room_number' => '04','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite CourtYard','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 13, 'room_number' => '01','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Suite City View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 14, 'room_number' => '02','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Studio Partial Ocean View','status_id'=>rand(1,3),'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 15, 'room_number' => '03','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Junior Suite','status_id'=>1,'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)],
            ['id' => 16, 'room_number' => '04','floor'=>rand(1,3),'price'=>rand(120,200),'description'=>'Senior Suite','status_id'=>1,'hotel_id'=>rand(1,3),'capacity'=>rand(1,6), 'tax' => number_format(rand(1,20),2),'fee' => number_format(rand(1,10),2)]
        ];


        $offers = \App\Offer::all();

        foreach ($items as $item) {
             \App\Room::create($item);
        }


    }
}
