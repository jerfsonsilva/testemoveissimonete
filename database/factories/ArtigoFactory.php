<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artigos;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Artigos::class, function (Faker $faker) {
	return [
		'foto' => $faker->imageUrl(500,500, false),
		'titulo' => $faker->userName,
		'autor' => $faker->name,
		'conteudo' => $faker->text(9000)
	];
});
