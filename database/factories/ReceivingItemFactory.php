<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ReceivingItem::class, function (Faker $faker) {
    return [
      'item_id' => function() {
        return factory(App\Models\Item::class)->create()->id;
      },
      'quantity' => $faker->numberBetween(1,20),
      'price' => $faker->numberBetween(1,190),
      'subtotal' => function (array $item) {
          return $item['quantity'] * $item['price'];
      }
    ];
});
