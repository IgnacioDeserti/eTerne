<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\product;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence();
        return [
            'name' => $name ,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->paragraph() , 
            'idCategory' => $this->faker->randomNumber() , 
            'stock' => $this->faker->randomNumber() , 
            'price' => $this->faker->randomNumber() , 
            'photo1' => $this->faker->imageUrl() , 
            'video' => $this->faker->imageUrl() , 
        ];
    }
}
