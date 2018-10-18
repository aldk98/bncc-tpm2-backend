<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'kelas_id' => $faker->numberBetween($min=1, $max=9),
        'dob' => $faker->date,
        'address' => $faker->address
    ];
});
