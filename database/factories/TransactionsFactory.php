<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        //
		'amount' => round($faker->numberBetween(1000, 40000000), -3),
		'reference' => $faker->uniqid(),
		'type' => $faker->randomElement(['Credit', 'Debit']),
		'account_number' => $faker->bankAccountNumber,
		'account_name' => $faker->name,
		'swift_code' => $faker->swiftBicNumber,
		'date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
    ];
});
