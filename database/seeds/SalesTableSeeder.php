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
      factory(App\Models\Sale::class, 15)
      ->create()
      ->each(function ($u) {
        $rand =  rand ( 3, 15 );
        for ($i=0;$i < $rand ;$i++){
          $u->items()->save($item = factory(App\Models\SaleItem::class)->make());

          $u->update(['amount'=> $u->amount + $item->subtotal]);
        }
      })
      ;
    }
}
