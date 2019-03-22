<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;
/**
 * Description of RoomStatusSeeder
 *
 * @author yoan
 */
class RoomStatusSeeder extends Seeder {
    //put your code here
         public function run(){
        $items = [
            
            ['id' => 1, 'name' => 'Available','description'=>'Room Available'],
            ['id' => 2, 'name' => 'On request','description'=>'Room On request'],
            ['id' => 3, 'name' => 'Sold out','description'=>'Room Sold out']
        ];

        foreach ($items as $item) {
            \App\RoomStatus::create($item);
        }
    }
}
