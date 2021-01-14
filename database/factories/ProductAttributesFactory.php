<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductAttributesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttributes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory()->create()->id,
            'key' => Str::random(4),
            'value' => Str::random(8),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
