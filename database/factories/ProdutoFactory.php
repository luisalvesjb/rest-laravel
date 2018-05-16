<?php

use Faker\Generator as Faker;

$factory->define(App\Produto::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->sentence(),
        'imagem' => $faker->word,
        'preco' => $faker->randomFloat(2,100,1000)
    ];
});
