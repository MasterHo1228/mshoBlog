<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $date_time = $faker->date . ' ' . $faker->time;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->gender,
        'description' => $faker->text(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'is_admin' => false,
        'activated' => true,
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'title' => $faker->title,
        'content' => $faker->text(),
        'read_count' => $faker->numberBetween(0, 1024),
        'user_id' => 1,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
