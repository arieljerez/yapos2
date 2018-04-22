<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(yapos2\Models\Sale::class, function ( Faker $faker) {

    return [
        'amount' => 0,
        'customer_id' => function() {
          return factory(yapos2\Models\Customer::class)->create()->id;
        },

    ];
});