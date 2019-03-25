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
            
            ['id' => 1, 'room_number' => '01','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 2, 'room_number' => '02','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite CourtYard','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 3, 'room_number' => '03','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 4, 'room_number' => '04','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite CourtYard','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 5, 'room_number' => '01','floor'=>'2','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 6, 'room_number' => '02','floor'=>'2','price'=>rand(1000,2400),'description'=>'1 Bedroom Suite Ocean View','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 7, 'room_number' => '03','floor'=>'2','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 8, 'room_number' => '04','floor'=>'2','price'=>rand(593,2400),'description'=>'Studio Suite CourtYard','status_id'=>1,'hotel_id'=>1,'capacity'=>rand(1,6)],
            ['id' => 9, 'room_number' => '01','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>2,'capacity'=>rand(1,6)],
            ['id' => 10, 'room_number' => '02','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite CourtYard','status_id'=>1,'hotel_id'=>2,'capacity'=>rand(1,6)],
            ['id' => 11, 'room_number' => '03','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>2,'capacity'=>rand(1,6)],
            ['id' => 12, 'room_number' => '04','floor'=>'1','price'=>rand(593,2400),'description'=>'Studio Suite CourtYard','status_id'=>1,'hotel_id'=>2,'capacity'=>rand(1,6)],
            ['id' => 13, 'room_number' => '01','floor'=>'2','price'=>rand(593,2400),'description'=>'Studio Suite City View','status_id'=>1,'hotel_id'=>3,'capacity'=>rand(1,6)],
            ['id' => 14, 'room_number' => '02','floor'=>'2','price'=>rand(800,2400),'description'=>'Studio Partial Ocean View','status_id'=>1,'hotel_id'=>3,'capacity'=>rand(1,6)],
            ['id' => 15, 'room_number' => '03','floor'=>'2','price'=>rand(700,2400),'description'=>'Junior Suite','status_id'=>1,'hotel_id'=>3,'capacity'=>rand(1,6)],
            ['id' => 16, 'room_number' => '04','floor'=>'2','price'=>rand(600,2400),'description'=>'Senior Suite','status_id'=>1,'hotel_id'=>3,'capacity'=>rand(1,6)]
        ];

        foreach ($items as $item) {
            \App\Room::create($item);
        }
    }
}
