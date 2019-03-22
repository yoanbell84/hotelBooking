<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Seeder;
/**
 * Description of RoleSeeder
 *
 * @author yoan
 */
class RoleSeeder extends Seeder {
    //put your code here
     public function run(){
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 2, 'title' => 'Simple user',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
