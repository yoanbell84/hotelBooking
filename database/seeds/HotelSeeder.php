<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;
/**
 * Description of HotelSeeder
 *
 * @author yoan
 *
 */
class HotelSeeder extends Seeder {
    //put your code here
     public function run(){
        $items = [
            
            ['id' => 1, 'name' => 'Sunset Key West Resort','description'=>'','rating'=>rand(1,5),'address'=>'234 Front Street, Florida, USA'],
            ['id' => 2, 'name' => 'Miami Beach Resort Club','description'=>'','rating'=>rand(1,5),'address'=>'3445 Miami Beach, Florida, USA'],
            ['id' => 3, 'name' => 'Best Bay Resort','description'=>'','rating'=>rand(1,5),'address'=>'234 Cutler Bay, Florida, USA']
        ];

        foreach ($items as $item) {
            \App\Hotel::create($item);
        }
    }
    
}
