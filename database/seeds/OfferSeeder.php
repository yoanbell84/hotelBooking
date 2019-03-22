<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/22/19
 * Time: 2:25 PM
 */

use Illuminate\Database\Seeder;
class OfferSeeder extends Seeder
{
  public function run()
  {
      $items = [

          ['id' => 1, 'name' => 'All inclusive','description'=>'All inclusive offer'],
          ['id' => 2, 'name' => 'breakfast','description'=>'Breakfast']
      ];

      foreach ($items as $item) {
          \App\Offer::create($item);
      }
  }

}
