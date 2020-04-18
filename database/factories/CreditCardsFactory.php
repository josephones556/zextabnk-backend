<?php

use Faker\Generator as Faker;

$factory->define(App\CreditCard::class, function (Faker $faker) {
    return [
        //
		'card_number' => $faker->creditCardNumber,
		'expiry' => $faker->creditCardExpirationDateString,
		'cvc' => $faker->numberBetween(100, 999)
    ];
});
