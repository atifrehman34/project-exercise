<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use App\Borrower;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(Borrower::class, function (Faker $faker) {
    return [
        'id' => Str::uuid()->toString(),
        'step' => $faker->numberBetween(1, 99999),
        'steps' => json_encode(array_map(function(){ return rand(0,99); }, array_fill(0, 5, null))),
        'login_id' => Str::uuid()->toString(),
        'monthly_sales' => $faker->numberBetween(100, 300),
        'monthly_expenses' => $faker->numberBetween(100, 300),
        'other_financing' => $faker->numberBetween(0, 9),
        'other_financing_amount' => $faker->numberBetween(100, 300),
        'legal_business_name' => $faker->firstName.' '.$faker->lastName,
        'business_physical_address' => $faker->streetAddress,
        'business_physical_city' => $faker->city,
        'business_physical_province' => $faker->stateAbbr,
        'business_physical_postal' =>  $faker->postcode,
        'email' => $faker->email,
        'dob' => Carbon::now()->format('Y-m-d'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});
