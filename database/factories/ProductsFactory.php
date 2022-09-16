<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            $price = $this->faker->numberBetween($min=100, $max=1000);
            $discount = $this->faker->numberBetween($min=10, $max=50);
        return [
            //
            'product_name' => $this->faker->text(10),
            'product_image' => $this->faker->imageUrl($width = 640, $height = 480),
            'brand' => $this->faker->text(20),
            'product_price' => $price - $discount,
            'product_old' => $price,
            'product_description' => $this->faker->paragraph(100),
            'category' => $this->faker->word()
        ];
    }
}
