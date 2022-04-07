<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dummy;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DummyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Dummy::class;

    public function definition()
    {
        return [
            //
            'nama' => $this->faker->name(mt_rand(2,10)),
            'alamat' => $this->faker->address(),
        ];
    }
}
