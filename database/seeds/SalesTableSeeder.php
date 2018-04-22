<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(yapos2\Models\Sale::class, 50)
      ->create()
      ->each(function ($u) {
        $rand =  rand ( 1,  25 );
        for ($i=0;$i < $rand ;$i++){
          $u->items()->save($item = factory(yapos2\Models\SaleItem::class)->make());

          $u->update(['amount'=> $u->amount + $item->subtotal]);
        }
      })
      ;
    }
}