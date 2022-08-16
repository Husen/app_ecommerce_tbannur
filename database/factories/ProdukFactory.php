<?php

namespace Database\Factories;
use App\Models\Produk;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_produk' => $this->faker->sentence(mt_rand(1,6)),
            'slug_produk' => $this->faker->slug(),
            'keterangan' => $this->faker->paragraph(),
            'berat' => rand(100,5000),
            'stok' => 20,
            'harga' => rand(1000,1000000)
        ];
    }
}
