<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'title' => $faker->sentence(),
        'body' => $faker->text(),
        'type1' => '0',
        'type2' => rand(0, 2),
        'thumbs_up' => rand(0, 1000),
        'is_good' => rand(0, 1),
        'description' => 'blog blog blog',
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
