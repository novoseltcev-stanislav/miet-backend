<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'building' => $this->faker->buildingNumber(),
            'floor' => $this->faker->numberBetween(1, 20),
            'apartment' => $this->faker->numberBetween(1, 400),
            'intercom_code' => $this->faker->numberBetween(1000, 9999),
            'customer_id' => Customer::query()->get()->random()->id,
            'created_at' => $this->faker->dateTime()
        ];
    }
}
