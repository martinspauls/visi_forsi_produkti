<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAttributes;
use Database\Factories\ProductAttributesFactory;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttributes::factory()->count(50)->create();
    }
}
